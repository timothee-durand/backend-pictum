<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = "departement";

    protected $fillable = [
        "lat",
        "long",
        "nom",
        "gestionnaire_id"
    ];

    public function gestionnaire()
    {
        return $this->belongsTo("App\Gestionnaire");
    }

    public function materiels()
    {
        return $this->hasMany("App\Materiel");
    }
}
