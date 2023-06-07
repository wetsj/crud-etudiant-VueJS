<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all(['id', 'prenom', 'nom', 'classe', 'email']);
        return response()->json($etudiants);
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
        $etudiant = Etudiant::create($request->post());
        return response()->json([
            'message'=>'Etudiant enregistrer successivement',
            'etudiant'=>$etudiant
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return response()->json($etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->fill($request->post())->save();
        return response()->json([
            'message'=>'Etudiant modifier avec success',
            'etudiant'=>$etudiant
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return response()->json([
            'message'=>'Etudiant supprimer avec success!!'
        ]);
    }
}
