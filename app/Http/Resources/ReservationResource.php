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
            "valide" => $this->valide,
            "prof" =>$this->prof,
            "nom_emprunteur"=>$this->nom_emprunteur,
            "prenom_emprunteur"=>$this->prenom_emprunteur,
            "mail_emprunteur" =>$this->mail_emprunteur,
            "id_univ_emprunteur" =>$this->id_univ_emprunteur,
            "raison_pro"=>$this->raison_pro,
            "est_pretes"=>$repContenu["estprete"],
            "malettes" =>$repContenu["malette"]
        ];
    }
}
