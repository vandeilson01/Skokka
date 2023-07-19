<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MercadoPagoModel extends Model
{
    use HasFactory;

    protected $table = 'mercado_pago_acesse';

    protected $fillable = [
        'cod',
        'token_1',
        'token_2',
        'token_3',
        'token_teste',
    ];
}
