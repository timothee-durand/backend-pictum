<?php

namespace App\Console\Commands;

use App\EstPrete;
use App\Gestionnaire;
use App\Jobs\SendMail;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class SendRappelsPreventifs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:rap-prev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Commande qui regarde dans la base de donnée et rappelle à tout ceux qui ont des rendez-vous le jour même qu'ils doivent y aller";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $est_prete = EstPrete::all()->toArray();

        array_map(function ($rdv) {
            if ($rdv["rendu"] == null) {
                if (Carbon::now()->isSameDay($rdv["date_debut"]) || Carbon::now()->isSameDay($rdv["date_fin"])) {

                    $contentmail = [
                        "raison_rdv" => $this->getRaisonRDV($rdv),
                        "nom" => Reservation::find($rdv['reservation_id'])->nom,
                        "date_rdv" => Carbon::parse($this->getDateRDV($rdv))->locale("fr_FR")->toDateString(),
                        "heure_rdv" => Carbon::parse($this->getDateRDV($rdv))->format("h:i"),
                        "mail_gestionnaire" => Gestionnaire::find($rdv["gestionnaire_id"])->mail
                    ];


                    $mailData = [
                        "to_address" => Reservation::find($rdv['reservation_id'])->mail
                    ];


                    $view = view("emails.content.rappel-rdv", $contentmail)->render();

                    SendMail::dispatch($mailData, new \App\Mail\RappelRDV(
                        Reservation::find($rdv['reservation_id'])->nom,
                        $this->getRaisonRDV($rdv),
                        Carbon::parse($this->getDateRDV($rdv))->locale("fr_FR")->toDateString(),
                        Carbon::parse($this->getDateRDV($rdv))->format("H:i"),
                        Gestionnaire::find($rdv["gestionnaire_id"])->mail,
                        [
                            "from_address" => env("MAIL_FROM_ADDRESS"),
                            "subject" => "Rappel RDV Pictum",
                            "content" => $view
                        ]
                    ));

                    Log::info("Mail rappel envoyé à :".$mailData['to_address']);


                }
            }

        }, $est_prete);


        return 0;
    }

    private function getRaisonRDV($rdv)
    {
        if (Carbon::now()->isBefore($rdv["date_debut"])) {
            return "Prise de matériel";
        } else {
            return "Retour de matériel";
        }
    }

    private function getDateRDV($rdv)
    {
        if (Carbon::now()->isBefore($rdv["date_debut"])) {
            return $rdv["date_debut"];
        } else {
            return $rdv["date_fin"];
        }
    }
}
