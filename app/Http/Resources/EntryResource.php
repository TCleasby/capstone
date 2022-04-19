<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EntryResource extends JsonResource
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
            'type' => 'entry',
            'id' => $this->id,
            'attributes' => [
                'fda-id' => $this->fda_id,
                'upload_date' => $this->upload_date->format('m-d-Y'),
            ] 
        ];
        
    }
}
