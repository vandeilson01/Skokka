<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssinaturasModel extends Model
{
    use HasFactory;

    protected $table = 'assinaturas';

    protected $fillable = [
        'id',
        'name',
        'id_acompanhante',
        'id_anuncio',
        'id_plan',
        'days',
        'expired',
    ];
}
