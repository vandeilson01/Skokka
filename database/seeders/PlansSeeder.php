<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("plans")->insert([
            [
                "name" => "3x3",
                "abrev" => "3 subidas ao dia por 3 dias",
                "value" => "13,80 ",
                "credit" => "6",
            ],
            [
                "name" => "3x7",
                "abrev" => "3 subidas ao dia por 7 dias",
                "value" => "27,60 ",
                "credit" => "12",
            ],
        ]);
    }
}
