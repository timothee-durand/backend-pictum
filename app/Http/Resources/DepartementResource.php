<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartementResource extends JsonResource
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
            "lat" => $this->lat,
            "long" =>$this->long,
            "nom" =>$this->nom,
            "gestionnaire" =>$this->gestionnaire
        ];
    }
}
