<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("anuncios_horarios")->insert([
            [
                'cod' => '60dec645df4813080cc5765f',
                'start' => '12:00',
                'end' => '14:00'
            ],
            [
                'cod' => '60dec648df4813080cc5a57e',
                'start' => '14:00',
                'end' => '16:00'
            ],
            [
                'cod' => '60dec64cdf4813080cc5e45a',
                'start' => '16:00',
                'end' => '18:00'
            ],
            [
                'cod' => '5f1993ee7b8ddd71474abf1a',
                'start' => '18:00',
                'end' => '21:00'
            ],
            [
                'cod' => '5f1993f07b8ddd71474ade17',
                'start' => '21:00',
                'end' => '00:00'
            ],
        ]);
    }
}
