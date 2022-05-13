<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(1)->create();

        $this->call(FertilizerSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CultureSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
