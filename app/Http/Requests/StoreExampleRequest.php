<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExampleRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:200480',
            'properties' => 'nullable|array',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان نمونه کار الزامی است.',
            'title.string' => 'عنوان نمونه کار باید از نوع رشته باشد.',
            'file.required' => 'فایل الزامی است.',
            'file.file' => 'فایل باید معتبر باشد.',
            'file.max' => 'حداکثر حجم فایل ۲۰ مگابایت است.',
            'description.string' => 'توضیحات باید از نوع رشته باشد.',
            'user_id.required' => 'فیلد user id الزامی است.',
            'user_id.exists' => 'کاربر مربوطه یافت نشد.',
        ];
    }
}
