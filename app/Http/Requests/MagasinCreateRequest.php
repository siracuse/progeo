<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MagasinCreateRequest extends FormRequest
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
            'nomMag' => 'required|max:50',
            'adrMag' => 'required|max:50',
            'telMag' => 'required|max:10',
            'mailMag' => 'required|max:255|unique:magasins',
            'siret' => 'required|max:255|unique:magasins',
            'photo1' => 'required|max:255',
            'photo2' => 'required|max:255',
            'latitude' => 'required|max:255|unique:magasins',
            'longitude' => 'required|max:255|unique:magasins',
            'insee' => 'required|max:255|unique:magasins',
            'cp' => 'required|max:255',
        ];
    }
}
