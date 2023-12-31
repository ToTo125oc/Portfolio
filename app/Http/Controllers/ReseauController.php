<?php

namespace App\Http\Controllers;

use App\Models\Reseau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReseauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reseaux = Reseau::all();
        return $reseaux;
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
        $this->validate($request,[
            'nom'=>'required',
            'urlReseau'=>'required',
            'imageReseau'=>'required',
        ]);
        $reseau = new Reseau();
        $reseau->nom = $request->nom;
        $reseau->urlReseau = $request->urlReseau;
        if($request->hasFile('imageReseau') && $request->file('imageReseau')->isValid()){
            $file = $request->file('imageReseau');
            $nom = sprintf('%s_%d.%s','imageReseau', time(), $file->extension());
            $file->storeAs('reseaux',$nom);
            $reseau->imageReseau = "reseaux/".$nom;
        }
        $reseau->save();
        return redirect()->route('projets.index');
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
        $this->validate($request,[
            'nom'=>'required',
            'urlReseau'=>'required',
            'imageReseau'=>'required',
        ]);
        $reseau = Reseau::find($id);
        $reseau->nom = $request->nom;
        $reseau->urlReseau = $request->urlReseau;
        if($request->hasFile('imageReseau') && $request->file('imageReseau')->isValid()){
            if (isset($reseau->imageProjet)) {
                Storage::delete($reseau->imageReseau);
            }
            $file = $request->file('imageReseau');
            $nom = sprintf('%s_%d.%s','imageReseau', time(), $file->extension());
            $file->storeAs('reseaux',$nom);
            $reseau->imageReseau = "reseaux/".$nom;
        }
        $reseau->save();
        return redirect()->route('projets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $reseau = Reseau::find($id);
        if($request->delete == "Supprimer"){
            if (isset($reseau->imageProjet)) {
                Storage::delete($reseau->imageReseau);
            }
            $reseau->delete();
        }
        return redirect()->route('projets.index');
    }
}
