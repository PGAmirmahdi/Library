<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCallRequest;
use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{

    public function index()
    {
        $calls = Call::paginate(10); // صفحه‌بندی نتایج
        return view('panel.calls.index', compact('calls'));
    }

    // نمایش فرم ایجاد رکورد جدید Call
    public function create()
    {
        return view('panel.calls.create');
    }

    // ذخیره رکورد جدید در دیتابیس
    public function store(StoreCallRequest $request)
    {
        // ایجاد رکورد جدید
        Call::create($request->all());

        // بازگشت به صفحه لیست رکوردها با پیام موفقیت
        return redirect()->route('calls.index')->with('success', 'Call created successfully.');
    }

    // نمایش یک رکورد خاص Call
    public function show($id)
    {
        $call = Call::findOrFail($id); // یافتن رکورد یا نمایش خطا 404
        return view('panel.calls.show', compact('call'));
    }

    // نمایش فرم ویرایش یک رکورد خاص Call
    public function edit($id)
    {
        $call = Call::findOrFail($id);
        return view('panel.calls.edit', compact('call'));
    }

    // به‌روزرسانی یک رکورد خاص Call در دیتابیس
    public function update(StoreCallRequest $request, $id)
    {
        // یافتن رکورد و به‌روزرسانی آن
        $call = Call::findOrFail($id);
        $call->update($request->all());

        // بازگشت به صفحه لیست رکوردها با پیام موفقیت
        return redirect()->route('calls.index')->with('success', 'Call updated successfully.');
    }

    // حذف یک رکورد خاص Call از دیتابیس
    public function destroy($id)
    {
        $call = Call::findOrFail($id);
        $call->delete();

        // بازگشت به صفحه لیست رکوردها با پیام موفقیت
        return redirect()->route('calls.index')->with('success', 'Call deleted successfully.');
    }
    public function search(Request $request)
    {
        $query = Call::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('family')) {
            $query->where('family', 'like', '%' . $request->family . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('number')) {
            $query->where('number', 'like', '%' . $request->number . '%');
        }

        // صفحه‌بندی نتایج جستجو
        $calls = $query->paginate(10);

        // بازگرداندن ویو همراه با نتایج جستجو
        return view('panel.calls.index', compact('calls'));
    }
}
