<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $repContenu = $this->estPretes();

        return [
            "id"=>$this->id,
            "valide" => $this->valide,
            "prof" =>$this->prof,
            "nom"=>$this->nom,
            "prenom"=>$this->prenom,
            "email" =>$this->email,
            "id_univ" =>$this->id_univ,
            "raison_pro"=>$this->raison_pro,
            "est_pretes"=>$repContenu["estprete"],
            "malettes" =>$repContenu["malette"]
        ];
    }
}
