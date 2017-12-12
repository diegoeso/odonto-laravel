<?php

use Illuminate\Database\Seeder;
use App\Pasiente;
class PasientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pasiente::class,10)->create();
    }
}
