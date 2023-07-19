<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnunciosImg extends Model
{
    use HasFactory;

    protected $table = 'anuncios_img';

    protected $fillable = [
        'id',
        'name',	
        'id_companhia',	
        'id_anuncio',	
        'file',	
        'img'
    ];

    
}
