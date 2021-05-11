<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'titulo',
        'tipo',
    ];

    public function acesso()
    {
        return $this->hasMany('App\Models\Acesso');
    }

}
