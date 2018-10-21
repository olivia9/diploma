<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        dd($this);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'email' => 'required|email',
                    'login' => 'required',
                    'password' => 'required',
                ];

            case 'index':
            case 'destroy':
                return [

                ];
        }
    }
}