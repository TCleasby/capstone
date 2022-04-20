<?php

namespace Database\Seeders;

use App\Models\Nutrients;
use Illuminate\Database\Seeder;

class NutrientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nutrients::factory()->count(40)->create();
    }
}
