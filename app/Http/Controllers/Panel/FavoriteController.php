<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FavoriteController extends Controller
{
    public function index()
    {
        // گرفتن علاقه‌مندی‌های کاربر جاری
        $favorites = Favorite::where('user_id', auth()->id())->paginate(10);

        return view('panel.favorites.index', compact('favorites'));
    }

    public function create()
    {
        return view('panel.favorites.create');
    }

    public function store(Request $request)
    {
        // اعتبارسنجی ورودی‌ها
        $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'nullable|image|max:2048', // حداکثر حجم تصویر 2MB
        ]);

        // ایجاد رکورد جدید علاقه‌مندی
        $favorite = new Favorite([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
        ]);

        // بررسی وجود تصویر و ذخیره آن
        if ($request->hasFile('picture')) {
            $filePath = $request->file('picture')->store('favorites', 'public');
            $favorite->picture = $filePath;
        }

        $favorite->save();

        // نمایش پیام موفقیت
        alert()->success('علاقه‌مندی با موفقیت اضافه شد');

        return redirect()->route('favorites.index');
    }

    public function edit(Favorite $favorite)
    {
        // بررسی اینکه علاقه‌مندی متعلق به کاربر جاری است
        if ($favorite->user_id !== auth()->id()) {
            abort(403, 'دسترسی مجاز نیست');
        }

        return view('panel.favorites.edit', compact('favorite'));
    }

    public function update(Request $request, Favorite $favorite)
    {
        // بررسی اینکه علاقه‌مندی متعلق به کاربر جاری است
        if ($favorite->user_id !== auth()->id()) {
            abort(403, 'دسترسی مجاز نیست');
        }

        // اعتبارسنجی ورودی‌ها
        $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'nullable|image|max:2048',
        ]);

        // به‌روزرسانی علاقه‌مندی
        $favorite->title = $request->input('title');

        // بررسی وجود تصویر و ذخیره آن
        if ($request->hasFile('picture')) {
            // حذف تصویر قدیمی از حافظه
            if ($favorite->picture) {
                Storage::disk('public')->delete($favorite->picture);
            }

            // ذخیره تصویر جدید
            $filePath = $request->file('picture')->store('favorites', 'public');
            $favorite->picture = $filePath;
        }

        $favorite->save();

        // نمایش پیام موفقیت
        alert()->success('علاقه‌مندی با موفقیت به‌روزرسانی شد');

        return redirect()->route('favorites.index');
    }

    public function destroy(Favorite $favorite)
    {
        // بررسی اینکه علاقه‌مندی متعلق به کاربر جاری است
        if ($favorite->user_id !== auth()->id()) {
            abort(403, 'دسترسی مجاز نیست');
        }

        // حذف تصویر از حافظه
        if ($favorite->picture) {
            Storage::disk('public')->delete($favorite->picture);
        }

        // حذف علاقه‌مندی از پایگاه داده
        $favorite->delete();

        // نمایش پیام موفقیت
        alert()->success('علاقه‌مندی با موفقیت حذف شد');

        return redirect()->route('favorites.index');
    }
    public function showFile($filename)
    {
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('favorites/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'favorites/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }
}
