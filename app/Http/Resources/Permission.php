<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;

class Permission extends JsonResponse
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function toArray($request)
    {
        return [

            $this->name => $this->permission
        ];
    }
}
