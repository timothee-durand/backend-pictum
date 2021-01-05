<?php

namespace App;

use App\Notifications\MailVerification;
use App\Notifications\MdpGestNotification;
use App\Notifications\NewPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
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

    public function departement()
    {
        return $this->hasOne("App\Departement");
    }

    public function creneaux()
    {
        return $this->hasMany("App\Creneaux");
    }

    public function indisponibilites()
    {
        return $this->hasMany("App\Indisponibilite");
    }

    public function rendezVous()
    {
        $estpretes = EstPrete::where("gestionnaire_id", $this->id)->get()->toArray();


        $reservations = [];

        foreach ($estpretes as $key => $item) {
            //si il n'y en a pas encore

           //on ajoute le matériel correspondant
            $mat =  Materiel::find($item["materiel_id"])->toArray();
            $mat["departement"] = Departement::find($mat["departement_id"]);

            $item["materiel"] = $mat;

            $reservationToAdd = Reservation::where("id", $item["reservation_id"])->first()->toArray();

            //echo "res".json_encode($reservationToAdd)."\n";

            if (count($reservations) === 0) {

                $reservationToAdd["est_pretes"][] = $item;

                $reservations[] = $reservationToAdd;
            } else {
                //on regarde si la réservation est déjà présente dans le tableau
                $key = $this->searchRes($reservationToAdd, $reservations);

                if ($key != false) {
                    //si elle y est dejà on lui ajoute le est_pretes
                    $reservations[$key]["est_pretes"][] = $item;
                } else {
                    //sinon on ajoute la réservation
                    $reservationToAdd["est_pretes"][] = $item;

                    $reservations[] = $reservationToAdd;
                }

            }

        }

        return $reservations;
    }


    public function materiels()
    {
        $dep = Departement::where("gestionnaire_id", $this->id)->get()->toArray();

        if ($dep === null) {
            //si pas de département assigné
            return [];
        }
        $materielsRep = [];


        foreach ($dep as $departement) {
            $materiels = Materiel::where("departement_id", $departement["id"])->get()->toArray();


            //tableau des réservations déjà traitées

            foreach ($materiels as $item) {
                $item["departement"] = $departement;

                $item["photo"] = Storage::url( $item["photo"]);

                //on ajoute les prets
                $estPretes = EstPrete::where("materiel_id", $item["id"])->get()->toArray();

               // echo "estprete" .json_encode($estPretes)."\n";


                //puis on complete les prets avec les réservations correspondantes
                foreach ($estPretes as $key => $est_prete) {
                    $estPretes[$key]["reservation"] = Reservation::find($est_prete["reservation_id"]);

                }

                $item["est_pretes"] = $estPretes;

                //echo "item" .json_encode($item)."\n";

                $materielsRep [] = $item;


            }
        }
        return $materielsRep;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new MailVerification());
    }

    public function sendNewPassword($password)
    {
        $this->notify(new NewPassword($password));
    }

    public function informGest($password) {
        $departement =  $this->departement();

        $this->notify(new MdpGestNotification($password, $departement, $this->admin));
    }

    private function searchRes($res, $arrayRes)
    {
        // echo "array". json_encode($arrayRes);
        //echo "objecy". json_encode($res);
        foreach ($arrayRes as $key => $_res) {
            if ($_res["id"] === $res["id"]) {
                return $key;
            }
        }
        return false;
    }
}
