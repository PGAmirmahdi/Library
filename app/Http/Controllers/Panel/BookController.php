<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index()
    {
        // دریافت کتاب‌ها برای کاربر لاگین شده
        $books = Book::orderbyDesc('id')->paginate(3);
        return view('panel.books.index', compact('books'));
    }

    public function create()
    {
        return view('panel.books.create');
    }

    public function store(StoreBookRequest $request)
    {
        // ایجاد رکورد جدید کتاب
        $book = new Book([
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'features' => json_encode($request->input('features')), // تبدیل ویژگی‌ها به JSON
            'inventory' => $request->input('inventory'),
            'borrowed_count' => $request->input('borrowed_count', 0),
            'total_count' => $request->input('total_count'),
        ]);

        // بررسی وجود فایل تصویر و ذخیره آن
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        $book->save();

        // نمایش پیام موفقیت
        alert()->success('کتاب با موفقیت اضافه شد');

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('panel.books.show', compact('book'));
    }

    public function edit($id)
    {
        // پیدا کردن کتاب با آی‌دی مشخص شده
        $book = Book::findOrFail($id);

        // تبدیل ویژگی‌ها از JSON به آرایه
        $book->features = json_decode($book->features, true);

        // بازگرداندن ویو و پاس کردن داده‌های کتاب به آن
        return view('panel.books.edit', compact('book'));
    }

    public function update(StoreBookRequest $request, $id)
    {
        // پیدا کردن کتاب با آی‌دی مشخص شده
        $book = Book::findOrFail($id);

        // به روز رسانی ویژگی‌های کتاب
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->features = json_encode($request->input('features')); // تبدیل ویژگی‌ها به JSON
        $book->inventory = $request->input('inventory');
        $book->borrowed_count = $request->input('borrowed_count', 0);
        $book->total_count = $request->input('total_count');

        // بررسی وجود فایل جدید و ذخیره آن
        if ($request->hasFile('image')) {
            // حذف فایل تصویر قدیمی
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }

            // ذخیره تصویر جدید
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        $book->save();

        // نمایش پیام موفقیت
        alert()->success('کتاب با موفقیت ویرایش شد');

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        // حذف تصویر مرتبط
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }

        // حذف کتاب
        $book->delete();
        return back();
    }

    public function showFile($filename)
    {
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('books/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'books/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }
}
