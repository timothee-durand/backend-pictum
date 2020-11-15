<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GestionnaireResource extends JsonResource
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
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "mail" => $this->mail,
            "id_univ" => $this->id_univ,
            "admin" => $this->admin,
            "departement" => $this->departement
        ];
    }
}
