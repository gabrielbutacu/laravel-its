<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request){
        //primo metodo per accedere ai parametri di tipo query string 
        //attraverso metodi diretti sull'oggetto $request
        //return $request->par1 . ' - ' . $request->par2;

        //secondo metodo per accedere ai parametri attraverso input, boolean, file
        //return $request->input('par1', 'valoreDefault');

        //dd($request->boolean('parB'));

        //$par1 = $request->input('par1');
        $par2 = $request->input('par2');
        //primo metodo per passare i parametri ad una vista utilizzando compact
        //return view('blogs.index', compact('par1'));

        //secondo metodo per passare i parametri utilizzando un array associativo
        return view('blogs.index', [
            'par1' => $request->input('par1'),
            'par2' => $par2,
        ]);
    }

    
    public function getRequest(){
        return view('blogs.form');
    }

    public function postRequest(Request $request){
        $request->validate([
            'title' => 'required',
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $title = $request->input('title');
        $attachment = $request->file('attachment');

        //dd($attachment);

        $originalFilename = $attachment->getClientOriginalName();
        dd($originalFilename);

        $fileName = $attachment->store('cartella1/sottocartella1');

        dd($fileName);


        return "valore input: $title , email: $email";
    }

    public function getPar($id, Request $request){
        dd('parametro url:'.$id.' par1'.$request->input('par1'));
    }

    public function getFile(){
        //cartella1/sottocartella1/XEw8o7CT1lrgnmiubEQmALJLn0YTofdRpQEuo782.txt
        $content = Storage::get('cartella1/sottocartella1/XEw8o7CT1lrgnmiubEQmALJLn0YTofdRpQEuo782.txt');

        dd($content);
    }
}
