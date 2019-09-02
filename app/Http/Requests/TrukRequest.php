<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_polisi' => [
                'required', 'max:11'
            ],
            'nama_supir' => [
                'required'
            ],
            'nama_perusahaan' => [
               'required', 'min:6'
            ],
            'bidang_perusahaan' => [
                'required', 'min:6'
            ],
            'uuid' => [
                'required', 'uuid'
            ],
            'major' => [
                'required', 'max:4'
            ],
            'minor' => [
                'required', 'max:4'
            ]
        ];
    }
}
