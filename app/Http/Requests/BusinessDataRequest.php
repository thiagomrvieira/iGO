<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        $partner  = Auth::user()->partner;

        $imgcover = $partner->images->image_cover ? '': 'required';
        $img01    = $partner->images->image_01    ? '': 'required';
        $img02    = $partner->images->image_02    ? '': 'required';
        $img03    = $partner->images->image_03    ? '': 'required';

        return [
            'image-cover' => $imgcover.'|file|mimes:jpg,png,jpeg',
            'image-01'    => $img01.   '|file|mimes:jpg,png,jpeg',
            'image-02'    => $img02.   '|file|mimes:jpg,png,jpeg',
            'image-03'    => $img03.   '|file|mimes:jpg,png,jpeg',
        ];
    }
}
