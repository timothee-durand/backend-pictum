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
            "id"=> $this->id,
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "email" => $this->email,
            "id_univ" => $this->id_univ,
            "admin" => $this->admin,
            "rdv"=>$this->rendezVous(),
            "creneaux"=>$this->creneaux,
            "indisponibilites"=>$this->indisponibilites,
            "departement"=>$this->departement,
            "materiels"=>$this->materiels()
        ];
    }
}
