<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilidad;
use App\Models\Pokemon;

class HabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $json = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $id);
        $decoded_json = json_decode($json, true);

        $response = [];
        $pokemon = Pokemon::findOrFail($id);
        foreach ($decoded_json['abilities'] as $habilidad){
           
               array_push($response, $pokemon->habilidades()->create([
                "nombre" => $habilidad['ability']['name']
            ]));
            
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
