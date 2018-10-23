<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        dd($this->user());
       // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->route()->getActionMethod()) {
            case 'newProject':
                return [
                  /*  'email' => 'required|email',
                    'login' => 'required',
                    'password' => 'required',*/
                ];

            case 'index':
            case 'destroy':
                return [

                ];
        }
    }
}
