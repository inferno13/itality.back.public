<?php

namespace App\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'group' => [
                'group_id' => $this->group_id,
                'group_name' => $this->group_name,
            ],
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ];
    }
}
