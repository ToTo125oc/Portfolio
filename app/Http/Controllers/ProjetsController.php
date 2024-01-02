<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Parsedown;

class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::all();
        return view('projets.index',['projets'=>$projets]);
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
            'titre'=>'required',
            'contenu'=>'required',
            'imageProjet'=>'required',
            'resume'=>'required',
        ]);
        $projet = new Projet();
        $projet->titre = $request->titre;
        $projet->resume = $request->resume;
        $projet->contenu = $request->contenu;
        if($request->hasFile('imageProjet') && $request->file('imageProjet')->isValid()){
            $file = $request->file('imageProjet');
            $nom = sprintf('%s_%d.%s','imageProjet', time(), $file->extension());
            $file->storeAs('projets',$nom);
            $projet->imageProjet = "projets/".$nom;
        }
        $projet->save();
        return redirect()->route('projets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projet = Projet::find($id);
        $parsedown = new Parsedown();
        return view('projets.show',['projet'=>$projet, 'parsedown'=>$parsedown]);
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
            'titre'=>'required',
            'resume'=>'required',
            'contenu'=>'required',
            'imageProjet'=>'required',
        ]);
        $projet = Projet::find($id);
        $projet->titre = $request->titre;
        $projet->resume = $request->resume;
        $projet->contenu = $request->contenu;
        if($request->hasFile('imageProjet') && $request->file('imageProjet')->isValid()){
            if (isset($projet->imageProjet)) {
                Storage::delete($projet->imageProjet);
            }
            $file = $request->file('imageProjet');
            $nom = sprintf('%s_%d.%s','imageProjet', time(), $file->extension());
            $file->storeAs('projets',$nom);
            $projet->imageProjet = "projets/".$nom;
        }
        $projet->save();
        return redirect()->route('projets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $projet = Projet::find($id);
            if (isset($projet->imageProjet)) {
                Storage::delete($projet->imageProjet);
            }
            $projet->delete();
        return redirect()->route('projets.index');
    }
}
