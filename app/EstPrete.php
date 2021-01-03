<?php

namespace App;

use App\Events\EstPreteModificationEvent;
use Illuminate\Database\Eloquent\Model;

class EstPrete extends Model
{
    protected $table = "est_pretes";
    protected $fillable = [
        "reservation_id",
        "date_debut",
        "date_fin",
        "rendu",
        "depart",
        "gestionnaire_id",
        "materiel_id",
    ];

    protected $dispatchesEvents = [
        "updated"=>EstPreteModificationEvent::class
    ];


    public function materiel () {
        return $this->belongsTo("App\Materiel");
    }

    public function reservation() {
        return $this->belongsTo("App\Reservation");
    }

    public function gestionnaire(){
        return $this->belongsTo("App\Gestionnaire");
    }
}
