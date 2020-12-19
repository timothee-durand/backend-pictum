<?php

namespace App;

use App\Notifications\MailVerification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Gestionnaire extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $guard = "gest";
    protected $table = "gestionnaire";
    protected $fillable = [
        "nom",
        "prenom",
        "email",
        "id_univ",
        "admin",
        "departement_id",
        "password"
    ];

    protected $hidden = [
        "password",
        "remember_token",
        "email_verified_at"
    ];

    public function departement () {
        return $this->belongsTo("App\Departement");
    }

    public function creneaux() {
        return $this->hasMany("App\Creneaux");
    }

    public function indisponibilites(){
        return $this->hasMany("App\Indisponibilite");
    }

    public function rendezVous(){
        return $this->hasMany(EstPrete::class, "gestionnaire_id");
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new MailVerification());
    }
}
