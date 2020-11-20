<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstPrete extends Model
{
    protected $table = "est_pretes";
    protected $fillable = [
        "id_materiel",
        "id_reservation",
        "date_debut",
        "date_fin",
        "rendu",
        "gestionnaire_id"
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
