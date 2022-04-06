<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            DB::table('records')->insert([
                'title' => $i . ' ' . Str::random(10),
                'description' => $i . ' ' . Str::random(150),
            ]);
        }
    }
}
