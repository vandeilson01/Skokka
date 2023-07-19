<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnunciosModel extends Model
{
    use HasFactory;

    protected $table = 'anuncios';

    protected $fillable = [
        'id_acompanhante',
        'nome',
        'endereco',
        'postal',
        'distrito',
        'idade',
        'titulo_anuncio',
        'idade',
        'texto',
        'tipo_contato',
        'email',
        'telefone',
        'whatsapp',
        'status',
        'collection_id',
    ];
}
