<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comentario extends Eloquent
{
    use HasFactory;
    public function Foto(){
        return $this->belongsTo(Foto::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
