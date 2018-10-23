<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Issue extends FormRequest
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
        switch($this->route()->getActionMethod()) {
            case 'store':
                return [
                 'name' => 'required',
                 'project' => 'required|exists:projects,id',
                 'executor' => 'required|exists:users,id',
                 'type' => 'required|exists:issue_types,id',
                 'status' => 'required|exists:issue_statuses,id',
                 'execution' => 'integer',
                 'priority' => 'required',
                 'complexity' => 'required'
                ];

            case 'index':
            case 'destroy':
                return [

                ];
        }
    }
}
