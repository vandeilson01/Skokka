<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnunciosHorarios extends Model
{
    use HasFactory;

    protected $table = 'anuncios_horarios';

    protected $fillable = [
        'cod',
        'start',
        'end',
    ];
}
