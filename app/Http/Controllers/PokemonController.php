<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use WpOrg\Requests\Response;

class PokemonController extends Controller
{

    public function addPokemon(Request $response, string $nombre)

    {
        # code...
        $jsonPokemon = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $nombre);
        $decoded_json_pokemon = json_decode($jsonPokemon, true);
        $peso = $decoded_json_pokemon['weight'];
        $altura = $decoded_json_pokemon['height'];

        $retorno = Pokemon::create([
            "nombre" => $nombre,
            "peso" => $peso,
            "altura" => $altura

        ]);


        return $retorno;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pokemons = Pokemon::all();
        return view('pokemons', with(["pokemons" => $pokemons])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $json = file_get_contents('https://pokeapi.co/api/v2/pokemon/?limit=10');
        $decoded_json = json_decode($json, true);
        $results = $decoded_json["results"];

        $response = [];
        
        foreach ($results as $value) {
            $nombre = $value["name"];
            array_push($response,self::addPokemon($request,$nombre));
        }

        return response()->json([
            "result"=> $response
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pokemon = Pokemon::findOrFail($id);
        
        return response()->json([
            "result"=> $pokemon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
