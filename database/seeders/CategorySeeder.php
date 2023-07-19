<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            [
                "name" => "1",
                "name" => "Acompanhantes",
                "description" => "Encontre as melhores acompanhantes do Brasil, que te oferecem grande variedade de serviços eróticos. Não espere mais!",
                "slug" => $this->createSlug('Acompanhantes'),
                "image_url_dir" => "categories/womenseekmen_repr.jpg"
            ],
            [
                "name" => "2",
                "name" => "Transex E Travestis",
                "description" => "Se atreva a provar todas as artistas do prazer com as mais sexys transex e travestis de sua cidade. Não perca a oportunidade de conhecê-las",
                "slug" => $this->createSlug('Transex E Travestis'),
                "image_url_dir" => "categories/trans_repr.jpg"
            ],
            [
                "name" => "3",
                "name" => "Massagens",
                "description" => "Encontre as melhores massagistas eróticas do Brasil. Serviços de massagens e acompanhantes na sua cidade!",
                "slug" => $this->createSlug('Massagens'),
                "image_url_dir" => "categories/massages_repr.jpg"
            ],
            [
                "name" => "4",
                "name" => "Acompanhantes Masculinos",
                "description" => "Encontra escorts e acompanhantes masculinos em Brasil. Curta encontros com homens. Anime-se, faça contato ou publique seu anúncio de forma gratuita",
                "slug" => $this->createSlug('Acompanhantes Masculinos'),
                "image_url_dir" => "categories/menseekwomen_repr.jpg"
            ],
            [
                "name" => "5",
                "name" => "Encontros Casuais",
                "description" => "Se o que você deseja é encontrar pessoas interessantes, homens e mulheres para um encontro casual sem compromisso, aqui é o melhor lugar",
                "slug" => $this->createSlug('Encontros Casuais'),
                "image_url_dir" => "categories/seekmeetings_repr.jpg"
            ]
        ]);
    }
    public function createSlug($string) {

        $table = array(
                'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
                'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
                'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
                'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
        );
    
        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);
    
        // -- Returns the slug
        return strtolower(strtr($string, $table));
    
    
    }
}
