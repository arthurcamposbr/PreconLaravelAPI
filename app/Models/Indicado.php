<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'celular',
        'empreendimento',
        'estado',
        'cidade',
        'regioes',
        'uc',
        'status',
        'cv_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
