<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Malette extends Model
{
    protected $table = "malette";
    protected $fillable = [
        "nom",
        "ref",
        "photo"
    ];

    public function materiels(){
        return $this->hasMany("App\Materiel");
    }

    public function estPretee(){
        $materiels = Materiel::where("malette_id", $this->id)->first();
        if($materiels !== null) {
            $est_prete = EstPrete::where("materiel_id", $materiels->id)->get();
        } else {
            $est_prete = [];
        }
        return $est_prete;
    }

    public function dayDispo () {
        $mats = $this->materiels()->first();

        if(empty((array)$mats)) {
            return [];
        }
        $dep = Departement::find($mats->departement_id);

        $indispo_gestionnaire = Gestionnaire::find($dep->gestionnaire_id)->indisponibilites;
        //récupère le nombre de jour qu'il faut renvoyer dans l'environnement
        $numberDayDispo = env("NUMBER_DAY_DISPO");

      //  echo json_encode(is_array($indispo_gestionnaire->toArray()));
        //filtre pour ne garder que les indisponibilites futures
        $indispo_gestionnaire = array_filter($indispo_gestionnaire->toArray(),function ($test) {
            if(Carbon::parse($test["date_debut"])->isFuture() || Carbon::parse($test["date_fin"])->isFuture()){
                return true;
            }  else {
                return false;
            }
        } );


        //mm filtre pour les prêts
        $prets_materiel = array_filter($mats->est_prete->toArray(), function ($test) {
            if(Carbon::parse($test["date_debut"])->isFuture() || Carbon::parse($test["date_fin"])->isFuture()){
                return true;
            }  else {
                return false;
            }
        });

        //echo"pret : ".json_encode($prets_materiel)."\n";

        $daysDispo = [];
        $actualDay = Carbon::now();

        for($i = 0; $i < $numberDayDispo; $i++) {
            //vérifie si le matériel est diponible
            $jour = array();
            $jour["date"] = $actualDay->toDateString();
            //echo "date".$jour["date"]."\n";
            if($mats->isDispo($indispo_gestionnaire, $actualDay) && $mats->isDispo($prets_materiel, $actualDay)){
                //echo "ouii\n";
                $jour["disponible"] = true;
            } else {
                // echo "non\n";
                $jour["disponible"] = false;
            }

            $daysDispo[] = $jour;

            $actualDay->addDay();
        }


        return $daysDispo;
    }

    public function isDispo (array $indispos, Carbon $jourAVerifier) {
        foreach ($indispos as $indispo) {
            if($jourAVerifier->isBetween($indispo["date_debut"], $indispo["date_fin"])) {
                return false;
            }
        }

        return true;
    }
}
