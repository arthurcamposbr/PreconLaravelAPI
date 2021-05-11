<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empreendimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'local_1',
        'local_2',
        'titulo',
        'nome',
        'nome_formatado',
        'desc',
        'foto',
        'slug',
        'data',
        'categoria',
        'link'
    ];

}
