<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255', // نام کتاب باید ضروری و یک رشته باشد
            'author' => 'required|string|max:255', // نویسنده نیز باید ضروری باشد
            'features' => 'nullable|array', // ویژگی‌ها می‌تواند آرایه باشد و اختیاری است
            'features.*' => 'string', // هر ویژگی باید یک رشته باشد
            'inventory' => 'required|integer|min:0', // موجودی باید عددی و حداقل صفر باشد
            'borrowed_count' => 'nullable|integer|min:0', // تعداد قرض‌گرفته شده اختیاری است و حداقل باید صفر باشد
            'total_count' => 'nullable|integer|min:0', // تعداد کل کتاب‌ها نیز عددی و حداقل صفر باشد
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // تصویر اختیاری است و باید فرمت‌های معتبر و حداکثر ۲ مگابایت باشد
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'نام کتاب اجباری است.',
            'author.required' => 'نویسنده اجباری است.',
            'inventory.required' => 'موجودی کتاب را وارد کنید.',
            'image.image' => 'فایل انتخاب شده باید یک تصویر باشد.',
        ];
    }
}
