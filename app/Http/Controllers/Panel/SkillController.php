<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::where('user_id', auth()->id())->paginate(10);
        return view('panel.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('panel.skill.create');
    }

    public function store(StoreSkillRequest $request)
    {

        // ایجاد رکورد جدید نمونه کار
        $skill = new Skill([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'properties' => json_encode($request->input('properties')), // تبدیل ویژگی‌ها به JSON
            'user_id' => auth()->id(),
        ]);

        // بررسی وجود فایل و ذخیره آن
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('skills', 'public');
            $skill->file = $filePath;
        }

        $skill->save();

        // نمایش پیام موفقیت
        alert()->success('مهارت با موفقیت اضافه شد');

        return redirect()->route('skill.index');
    }

    public function show(Skill $skill)
    {
        return view('panel.skill.show', compact('skill'));
    }

    public function edit($id)
    {
        // پیدا کردن نمونه کار با آی‌دی مشخص شده
        $skill = Skill::findOrFail($id);

        // تبدیل ویژگی‌ها از JSON به آرایه
        $skill->properties = json_decode($skill->properties, true);

        // بازگرداندن ویو و پاس کردن داده‌های نمونه کار به آن
        return view('panel.skill.edit', compact('skill'));
    }

    public function update(StoreSkillRequest $request, $id)
    {
        // پیدا کردن نمونه کار با آی‌دی مشخص شده
        $skill = Skill::findOrFail($id);

        // به روز رسانی ویژگی‌های نمونه کار
        $skill->title = $request->input('title');
        $skill->description = $request->input('description');
        $skill->properties = json_encode($request->input('properties')); // تبدیل ویژگی‌ها به JSON
        $skill->user_id = auth()->id();

        // بررسی وجود فایل جدید و ذخیره آن
        if ($request->hasFile('file')) {
            // حذف فایل قدیمی
            if ($skill->file) {
                Storage::disk('public')->delete($skill->file);
            }

            // ذخیره فایل جدید
            $filePath = $request->file('file')->store('skills', 'public');
            $skill->file = $filePath;
        }

        $skill->save();

        // نمایش پیام موفقیت
        alert()->success('مهارت با موفقیت ویرایش شد');

        return redirect()->route('skill.index');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back();
    }
    public function showFile($filename)
    {
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('skills/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'skills/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }
}
