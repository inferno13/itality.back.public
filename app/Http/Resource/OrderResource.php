<?php

namespace App\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'date_start_work' => $this->date_start_work,
            'date_end_work' => $this->date_end_work,
            'counterparty' => $this->counterparty,
            'cars' => $this->cars,
            'sum' => $this->sum,
            'payed' => $this->payed,
            'status' => $this->status,
            'comments' => $this->comments,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ];
    }
}
