<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstPreteResource extends JsonResource
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
            "materiel" => $this->materiel,
            "reservation" => $this->reservation,
            "gestionnaire"=>$this->gestionnaire,
            "date_debut"=>$this->date_debut,
            "date_fin"=>$this->date_fin,
            "rendu"=>$this->rendu,
            "depart"=>$this->depart
        ];
    }
}
