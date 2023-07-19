<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BCategoryPlus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("category_pluses")->insert([
            [
                "name" => "Acompanhantes",
                "categories_id" => "1",
                "details" => "Cuiabá",
                'link' => 'acompanhantes/cuiaba/',
                "status" => "active",
            ],
            [
                "name" => "Acompanhantes",
                "categories_id" => "1",
                "details" => "São Paulo",
                'link' => 'acompanhantes/sao-paulo/',
                "status" => "active",
            ],
            [
                "name" => "Acompanhantes",
                "categories_id" => "1",
                "details" => "Rio de Janeiro",
                'link' => 'acompanhantes/rio-de-janeiro/',
                "status" => "active",
            ],
            [
                "name" => "Acompanhantes",
                "categories_id" => "1",
                "details"   => "Sexo Virtual",
                'link' => 'acompanhantes/tag/sexo-virtual/',
                "status" => "active",
            ],
             
        ]);

        // 


        DB::table("category_pluses")->insert([
            [
                "name" => "Transex E Travestis",
                "categories_id" => "2",
                'link' => 'transex_e_travestis/cuiaba/',
                "details" => "Cuiabá",
                "status" => "active",
            ],
            [
                "name" => "Transex E Travestis",
                "categories_id" => "2",
                'link' => 'transex_e_travestis/sao-paulo/',
                "details" => "São Paulo",
                "status" => "active",
            ],
            [
                "name" => "Transex E Travestis",
                "categories_id" => "2",
                'link' => 'transex_e_travestis/rio-de-janeiro/',
                "details" => "Rio de Janeiro",
                "status" => "active",
            ],
             
        ]);

        // 

        DB::table("category_pluses")->insert([
            [
                "name" => "Massagens",
                "categories_id" => "3",
                'link' => 'massagens/cuiaba/',
                "details" => "Cuiabá",
                "status" => "active",
            ],
            [
                "name" => "Massagens",
                "categories_id" => "3",
                'link' => 'massagens/sao-paulo/',
                "details" => "São Paulo",
                "status" => "active",
            ],
            [
                "name" => "Massagens",
                "categories_id" => "3",
                'link' => 'massagens/rio-de-janeiro/',
                "details" => "Rio de Janeiro",
                "status" => "active",
            ],
             
        ]);

        DB::table("category_pluses")->insert([
            [
                "name" => "Acompanhantes Masculinos",
                "categories_id" => "4",
                'link' => 'acompanhantes_masculino/cuiaba/',
                "details" => "Cuiabá",
                "status" => "active",
            ],
            [
                "name" => "Acompanhantes Masculinos",
                "categories_id" => "4",
                'link' => 'acompanhantes_masculino/sao-paulo/',
                "details" => "São Paulo",
                "status" => "active",
            ],
            [
                "name" => "Acompanhantes Masculinos",
                "categories_id" => "4",
                'link' => 'acompanhantes_masculino/rio-de-janeiro/',
                "details" => "Rio de Janeiro",
                "status" => "active",
            ],
             
        ]);

        // 

        DB::table("category_pluses")->insert([
            [
                "name" => "Encontros Casuais",
                "categories_id" => "5",
                'link' => 'encontros_casuais/cuiaba/',
                "details" => "Cuiabá",
                "status" => "active",
            ],
            [
                "name" => "Encontros Casuais",
                "categories_id" => "5",
                'link' => 'encontros_casuais/sao-paulo/',
                "details" => "São Paulo",
                "status" => "active",
            ],
            [
                "name" => "Encontros Casuais",
                "categories_id" => "5",
                'link' => 'encontros_casuais/rio-de-janeiro/',
                "details" => "Rio de Janeiro",
                "status" => "active",
            ],
             
        ]);
    }
}
