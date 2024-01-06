<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competences = Competence::all();
        $setting = Setting::find(1);
        return view("competences.index",['competences'=>$competences,'setting'=>$setting]);
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
            'description'=>'required',
            'imageCompetence'=>'required'
        ]);
        $competence = new Competence();
        $competence->nom = $request->nom;
        $competence->description = $request->description;
        if($request->hasFile('imageCompetence') && $request->file('imageCompetence')->isValid()){
            $file = $request->file('imageCompetence');
            $nom = sprintf('%s_%d.%s','imageCompetence', time(), $file->extension());
            $file->storeAs('competences',$nom);
            $competence->imageCompetence = "competences/".$nom;
        }
        $competence->save();
        return redirect()->route('competences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competence = Competence::find($id);
        $setting = Setting::find(1);
        return view("competences.show",['competence'=>$competence,'setting'=>$setting]);
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
            'description'=>'required',
            'imageCompetence'=>'required',
        ]);
        $competence = Competence::find($id);
        $competence->nom = $request->nom;
        $competence->description = $request->description;
        if($request->hasFile('imageCompetence') && $request->file('imageCompetence')->isValid()){
            if (isset($competence->imageProjet)) {
                Storage::delete($competence->imageProjet);
            }
            $file = $request->file('imageCompetence');
            $nom = sprintf('%s_%d.%s','imageCompetence', time(), $file->extension());
            $file->storeAs('competences',$nom);
            $competence->imageCompetence = "competences/".$nom;
        }
        $competence->save();
        return redirect()->route('competences.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $competence = Competence::find($id);
        if (isset($competence->imageProjet)) {
            Storage::delete($competence->imageProjet);
        }
        $competence->delete();
        return redirect()->route('competences.index');
    }
}
