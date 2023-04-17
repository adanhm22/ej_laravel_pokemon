<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pokemon;

class Habilidad extends Model
{
    use HasFactory;

    public function pokemon()
    {
        return $this->BelongsTo(Pokemon::class,'pokemons');
    }
}
