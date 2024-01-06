<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccueillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::find(1);
        return view('accueil.index',['setting'=>$setting]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function param()
    {
        $setting = Setting::find(1);
        return view('accueil.param',['setting'=>$setting]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'imageAccueil'=>'required',
            'imageAvatar'=>'required',
            'jobRechercher'=>'required',
            'jobRechercher2'=>'required',
            'nomPrenom'=>'required',
        ]);
        $setting = Setting::find(1);
        $setting->jobRechercher = $request->jobRechercher;
        $setting->jobRechercher2 = $request->jobRechercher2;
        $setting->nomPrenom = $request->nomPrenom;
        if($request->hasFile('imageAccueil') && $request->file('imageAccueil')->isValid()){
            if (isset($setting->imageAccueil) && Storage::exists($setting->imageAvatar)) {
                Storage::delete($setting->imageAccueil);
            }
            $file = $request->file('imageAccueil');
            $nom = sprintf('%s_%d.%s','imageAccueil', time(), $file->extension());
            $file->storeAs('accueil',$nom);
            $setting->imageAccueil = "accueil/".$nom;
        }
        if($request->hasFile('imageAvatar') && $request->file('imageAvatar')->isValid()){
            if (isset($setting->imageAvatar) && Storage::exists($setting->imageAvatar)) {
                Storage::delete($setting->imageAvatar);
            }
            $file = $request->file('imageAvatar');
            $nom = sprintf('%s_%d.%s','imageAvatar', time(), $file->extension());
            $file->storeAs('accueil',$nom);
            $setting->imageAvatar = "accueil/".$nom;
        }
        $setting->save();
        return redirect()->route('index');
    }

}
