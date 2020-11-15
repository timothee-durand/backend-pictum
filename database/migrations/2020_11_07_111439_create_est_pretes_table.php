<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstPretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('est_pretes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("date_debut");
            $table->dateTime("date_fin");
            $table->dateTime("rendu")->nullable();
            $table->foreignId("materiel_id")->constrained("materiel");
            $table->foreignId("reservation_id")->constrained("reservation");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('est_pretes');
    }
}
