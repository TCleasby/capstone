<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NutrientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'nutrient',
            'id' => $this->id,
            'attributes' => [
                'nutrientName' => $this->nutrientName,
                'unitName' => $this->unitName,
                'value' => $this->value,
            ]
        ];
        
    }
}
