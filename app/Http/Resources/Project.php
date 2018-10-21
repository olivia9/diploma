<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;

class Project extends JsonResponse
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
