<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos_fixos extends Model
{
    use HasFactory;

    protected $fillable = [
        'NOME_PRODUTO',
        'DESCRICAO',
    ];
}
