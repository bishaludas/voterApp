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
        // $this->call(UsersTableSeeder::class);
        factory(App\Zone::class, 10)->create();
        factory(App\District::class, 10)->create();
        factory(App\MunicipalityVdc::class, 10)->create();
        factory(App\Ward::class, 10)->create();
        factory(App\ConstituencyArea::class, 10)->create();
    }
}
