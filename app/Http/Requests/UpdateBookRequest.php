<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'inventory' => 'required|integer|min:0',
            'borrowed_count' => 'nullable|integer|min:0',
            'total_count' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
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
