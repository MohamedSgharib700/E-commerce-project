<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            
            'title' => 'required|unique:posts|max:255',
            'short' => 'required',
            'description' => 'required',
            'address' => 'required',
            'price' => 'required',
        ];
    }
    
     public function messages()
    {
        return [
            
            'title.required' => 'من فضلك ادخل عنوان الاعلان',
            'short.required' => 'من فضلك ادخل العنوان المختصر للاعلان',
            'description.required' => 'من فضلك ادخل تفاصيل الاعلان',
            'address.required' => 'من فضلك ادخل العنوان الشخصي الخاص بك',
            'price.required' => 'من فضلك ادخل السعر',
        ];
    }
}
