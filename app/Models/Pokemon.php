<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Habilidad;

class Pokemon extends Model
{
    use HasFactory;
    public $table = "pokemons";

    protected $fillable = ['nombre','altura','peso'];
    public function habilidades()
    {
        return $this->hasMany(Habilidad::class,'fk_id_habilidades');
    }
}
