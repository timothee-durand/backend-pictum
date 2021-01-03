<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "type";
    protected $fillable = [
        "nom",
        "picto"
    ];

    public function materiels(){
        return $this->hasMany("App\Materiel");
    }
}
