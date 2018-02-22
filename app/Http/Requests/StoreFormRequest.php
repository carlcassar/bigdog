<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
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
            'first_name'           => 'required|min:2|max:50',
            'last_name'            => 'required|min:2|max:50',
            'email'                => 'required|email|max:100',
            'address'              => 'required|min:2|max:100',
            'county'               => 'required|min:2|max:100',
            'selfie'               => 'required',
            'disney_on_ice'        => 'required',
            'marvel_universe_live' => 'required',
            'monster_jam'          => 'required',
        ];
    }
}
