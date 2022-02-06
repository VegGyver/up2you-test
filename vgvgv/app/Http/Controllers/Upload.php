<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Upload extends Controller
{
    public function show()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        // Convalida 
        $request->validate([
            'name' => 'required|max:10',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:1024',
        ]);
        
        // Salviamo l'immagine sul server
        $path = $request->file('photo')->storeAs('/app/public', $request->name);

        // Svuotiamo i campi del form
        $this->name = '';
        $this->photo = '';

        return view('success');
    }
}
