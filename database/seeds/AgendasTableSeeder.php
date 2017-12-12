<?php

use Illuminate\Database\Seeder;
use App\Agenda;
class AgendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Agenda::class,10)->create();
    }
}
