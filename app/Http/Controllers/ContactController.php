<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('email.contact');
    }

    public function sendMail(Request $request){
        $this->validate($request,[
            'nom'=>'required',
            'email'=>'required',
            'message'=>'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $content = ["nom"=>$request->nom, "email"=>$request->email, "message"=>$request->message];
        Mail::to($content['email'])->send(new Contact($content));
        return redirect()->route('contact.index');
    }
}
