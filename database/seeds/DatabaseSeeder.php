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
      DB::table('questions')->insert([
        ['question' => 'Fait beau ?','reponse' => 'cc'],
        ['question' => 'On mnage koi ?','reponse' => 'cc'],
      ]);
    }
}
