<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Habilidad;

class Pokemon extends Model
{
    use HasFactory;

    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class,'habilidades');
    }
}
