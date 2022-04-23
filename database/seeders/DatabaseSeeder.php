<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EntrySeeder::class,
            NutrientsSeeder::class,
        ]);
        \App\Models\User::factory(2)->create();
        DB::table('users')->insert([
            'name' => "Tyren Cleasby",
            'email' => "tg.cleasby@gmail.com",
            'password' => Hash::make("password"),
        ]);
    }
}
