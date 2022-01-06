<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
      return view('contacto.index');
    }
    public function store(Request $request){

        $request->validate([
          'name'=>'required',
          'mail'=>'required|email',
          'message'=>'required'
        ]);

        $correo = new ContactoMailable($request->all());
        Mail::To('guidocabrerasdla97@gmail.com')->send($correo);
     
        return redirect()->route('contacto.index')->with('infomsj','Mensaje enviado exitosamente');
    }
}
