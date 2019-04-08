<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ([
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'room_type' => $this->type->name,
            'floor' => $this->floor,
            'status' => $this->status,
            'max_person' => $this->max_person,
            'created_at' => $this->created_at->diffForHumans(),
            'created_by' => $this->user->name,
            'last_updated' => $this->updated_at->diffForHumans()    
        ]);
    }
}
