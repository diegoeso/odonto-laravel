<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TratamientosTableSeeder::class);
        $this->call(PasientesTableSeeder::class);
        $this->call(AgendasTableSeeder::class);
        $this->call(DiccionariosTableSeeder::class);
    }
}
