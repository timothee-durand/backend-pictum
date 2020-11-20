<?php

namespace App;

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
}
