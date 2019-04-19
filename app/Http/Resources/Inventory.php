<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Inventory extends EntityChild
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->entity([
            'item' => $this->item,
            'position' => $this->position,
            'amount' => $this->amount,
            'visibility' => $this->visibility
        ]);
    }
}
