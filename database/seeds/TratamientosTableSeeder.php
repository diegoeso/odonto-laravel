<?php

use Illuminate\Database\Seeder;
use App\Tratamiento;

class TratamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tratamiento::class,10)->create();
    }
}
