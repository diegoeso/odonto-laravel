<?php

use Illuminate\Database\Seeder;
use App\Diccionario;
class DiccionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Diccionario::class,20)->create();
    }
}
