<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessDataRequest extends FormRequest
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
            'image-cover' => 'required|file|mimes:jpg,png,jpeg',
            'image-01'    => 'required|file|mimes:jpg,png,jpeg',
            'image-02'    => 'required|file|mimes:jpg,png,jpeg',
            'image-03'    => 'required|file|mimes:jpg,png,jpeg',
        ];
    }
}
