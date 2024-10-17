<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ResumeController extends Controller
{

    public function index()
    {
        // گرفتن رزومه کاربر جاری
        $resume = Resume::where('user_id', auth()->id())->first();

        // بازگشت به نمای ایندکس با داده‌های رزومه
        return view('panel.resume.create', compact('resume'));
    }

    public function create()
    {
        return view('panel.resume.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit()
    {

    }

    public function update(Request $request)
    {
        // پیدا کردن رزومه مربوط به کاربر جاری
        $resume = Resume::where('user_id', auth()->id())->firstOrFail();

        // حذف فیلد name از درخواست (زیرا نباید تغییر کند)
        $request->request->remove('name');

        // اعتبارسنجی ورودی‌ها
        $request->validate([
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'city' => 'nullable|string|max:255',
            'job' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:100048', // 100MB
            'job_history' => 'required|integer',
            'instagram' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
        ]);

        // بررسی وجود فایل جدید و ذخیره آن
        if ($request->hasFile('file')) {
            // حذف فایل قدیمی از حافظه
            if ($resume->file) {
                Storage::disk('public')->delete($resume->file);
            }

            // ذخیره فایل جدید
            $filePath = $request->file('file')->store('resumes', 'public');
            $resume->file = $filePath;
        }

        // به‌روزرسانی داده‌های رزومه
        $resume->update($request->only([
            'phone', 'email', 'city', 'job', 'description', 'job_history', 'instagram', 'telegram'
        ]));

        // نمایش پیام موفقیت
        alert()->success('رزومه با موفقیت به‌روزرسانی شد');

        // بازگشت به صفحه فهرست رزومه‌ها
        return redirect()->route('resume.index');
    }

    public function destroy($id)
    {
        //
    }
    public function showFile($filename)
    {
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('resumes/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'resumes/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }
}
