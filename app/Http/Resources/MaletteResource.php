<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaletteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "nom" => $this->nom,
            "ref" => $this->ref,
            "photo" => $this->photo,
            "materiels" => $this->materiels
        ];
    }
}
