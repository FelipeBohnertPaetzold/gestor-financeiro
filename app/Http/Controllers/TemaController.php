<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemaController extends Controller
{
    public function __construct()
    {
        $this->tema = new Tema();
    }

    public function trocarTemaView()
    {
        return view('configuracoes.aparencia', [
            'data' => $this->tema->all()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->tema_id = $request->tema_id;
        $user->update();
        return redirect("/users/temas");
    }
}
