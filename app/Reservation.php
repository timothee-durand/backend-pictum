<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reservation extends Authenticatable
{
    protected $guard = 'res';
    protected $table = "reservation";

    protected $fillable = [
        "valide",
        "prof",
        "nom",
        "prenom",
        "mail",
        "id_univ",
        "raison_pro"
    ];

    /**
     * Give the EstPrete, Materiel, Gestionnaire for a Reservation
     *
     * @return array
     */
    public function estPretes(){
        //recuperation de tous les prets de la reservation
        $estpretes = EstPrete::where("reservation_id", $this->id)->get();

        //pour chaque pret on fait une requete pour ajouter le matériel et le gestionnaire correspondant
        //on en profite pour regarder si cela ne concerne pas aussi une/des malette(s)
        $idMalettes=[];
        foreach($estpretes as $pret) {
            //on ajoute les instances correspondantes
            $pret->materiel = Materiel::find($pret->materiel_id);
            $pret->gestionnaire = Gestionnaire::find($pret->gestionnaire_id);

            //on ajoute l'id de la malette dans le tableau si il n'est pas nul
            $idMalettes[] = $pret->materiel->malette_id;
        }

        $malettes = [];
        //on regarde si une malette correspond
        foreach ($idMalettes as $idMalette) {
            //on récupère la malette correspondante
            $testMalette = Malette::find($idMalette);

            //si elle n'est pas déjà dans le tableau on l'ajoute
            if(!in_array($testMalette, $malettes)) {
                $malettes [] = $testMalette;
            }
        }

        return ["estprete"=>$estpretes,"malette"=> $malettes];
    }
}
