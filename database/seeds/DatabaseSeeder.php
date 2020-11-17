<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Blacklist::class, 10)->create();
        factory(\App\Type::class, 10)->create();
        factory(\App\Malette::class, 10)->create();
        factory(\App\Gestionnaire::class, 5)->create();
        factory(\App\Departement::class, 5)->create();
        factory(\App\Reservation::class, 50)->create();
        factory(\App\Materiel::class, 30)->create();
        factory(\App\EstPrete::class, 20)->create();

        factory(\App\Creneaux::class, 35)->create();
        factory(\App\Indisponibilite::class, 10)->create();
    }
}
