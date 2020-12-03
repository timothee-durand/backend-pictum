<?php

namespace App\Console\Commands;

use App\EstPrete;
use App\Gestionnaire;
use App\Jobs\SendMail;
use App\Materiel;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendRappelNonRendu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:rap-nr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoi des rappel pour tout les matériels non rendu';

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
        $reservation = Reservation::all()->toArray();

        array_map(function ($res) {
            $est_prete = EstPrete::where([['reservation_id', $res["id"]], ["rendu", null]])->get()->toArray();

            if($est_prete != null) {

                $materielsNonRendu = [];
                $mailGest = "";

                foreach ($est_prete as $rdv) {
                    if ($rdv["rendu"] == null && Carbon::parse($rdv["date_fin"])->isPast()) {
                        $materielsNonRendu[] = Materiel::find($rdv["materiel_id"]);
                        $mailGest = Gestionnaire::find($rdv['gestionnaire_id'])->mail;
                    }
                }


                $mailData = [
                    "to_address" => $res["mail"]
                ];

                echo "maildata".json_encode($mailData)."\n matnonrendu".json_encode($materielsNonRendu)."\n mailgest".$mailGest."\n";

                SendMail::dispatch($mailData, new \App\Mail\RappelNonRendu(
                    $res["nom"],
                    $materielsNonRendu,
                    $mailGest,
                    [
                        "from_address" => env("MAIL_FROM_ADDRESS"),
                        "subject" => "Rappel Rendu Pictum",
                    ]
                ));

                Log::info("Mail rappel non rendu envoyé à :".$mailData['to_address']);
            }




        }, $reservation);
        return 0;
    }
}
