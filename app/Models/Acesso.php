<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    use HasFactory;

    protected $fillable = [
        'uc',
        'ip',
        'cidade',
        'estado',
        'lat',
        'lon',
        'user_id'
    ];

    public function link()
    {
        return $this->belongsTo('App\Models\Link');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
