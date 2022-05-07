<?php

namespace Database\Seeders;

use App\Models\Fertilizer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FertilizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Fertilizer::factory(2)->create();
    }
}
