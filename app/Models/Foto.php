<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Foto extends Eloquent
{
    use HasFactory;
    protected $fillable = [
        'ruta',
        'estado',
        'descripcion',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Comentario(){
        return $this->embedsMany(Comentario::class);
    }
}
