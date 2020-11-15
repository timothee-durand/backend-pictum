<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndisponibilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indisponibilite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("date_debut");
            $table->dateTime("date_fin");
            $table->foreignId('gestionnaire_id')->constrained("gestionnaire")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indisponibilite');
    }
}
