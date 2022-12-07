<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Foto extends Eloquent
{
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Comentario(){
        return $this->hasMany(Comentario::class);
    }
}
