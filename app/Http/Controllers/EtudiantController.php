<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Etudiant;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all()->toArray();
        return array_reverse($etudiants);      
    }
    public function store(Request $request)
    {
        $etudiant = new Etudiant([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'classe' => $request->input('classe'),
            'email' => $request->input('email')
        ]);
        $etudiant->save();
        return response()->json('Etudiant Creer!');
    }
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        return response()->json($etudiant);
    }
    public function update($id, Request $request)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->update($request->all());
        return response()->json('Etudiant Modifier!');
    }
    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return response()->json('Etudiant Supprimer!');
    }
}
