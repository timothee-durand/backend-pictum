<?php

namespace App;

use App\Events\EstPreteModificationEvent;
use App\Events\ReservationModificationEvent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Object_;

class Materiel extends Model
{

    protected $table = "materiel";

    protected $fillable = [
        "ref",
        "nom",
        "photo",
        "usage",
        "carac",
        "tutos",
        "notice",
        "indisp",
        "indisp_raison",
        "type_id",
        "malette_id",
        "departement_id",
        "pro"
    ];

    protected $dispatchesEvents = [
        "updated"=>EstPreteModificationEvent::class
    ];


    public function departement() {
        return $this->belongsTo("App\Departement");
    }

    public function malette() {
        return $this->belongsTo("App\Malette");
    }

    public function est_prete() {
        return $this->hasMany("App\EstPrete");
    }

    public function gestionnaire() {
        return Gestionnaire::find($this->departement->gestionnaire_id);
    }

    public function type() {
        return $this->belongsTo("App\Type");
    }

    public function dayDispo () {

        $indispo_gestionnaire = $this->gestionnaire()->indisponibilites->toArray();

        //récupère le nombre de jour qu'il faut renvoyer dans l'environnement
        $numberDayDispo = env("NUMBER_DAY_DISPO");

        //filtre pour ne garder que les indisponibilites futures
        $indispo_gestionnaire = array_filter($indispo_gestionnaire,function ($test) {
            if(Carbon::parse($test["date_debut"])->isFuture() || Carbon::parse($test["date_fin"])->isFuture()){
                return true;
            }  else {
                return false;
            }
        } );

        //mm filtre pour les prêts
        $prets_materiel = array_filter($this->est_prete->toArray(), function ($test) {
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
            if($this->isDispo($indispo_gestionnaire, $actualDay) && $this->isDispo($prets_materiel, $actualDay)){
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
