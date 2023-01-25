<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone->number,
            'country' => $this->country->name,
            'registered' => $this->created_at,
        ];
    }
}