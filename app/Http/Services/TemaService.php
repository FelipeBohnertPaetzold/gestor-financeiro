<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 18/11/2016
 * Time: 14:08
 */

namespace App\Http\Services;


use App\Tema;
use Illuminate\Support\Facades\Auth;

class TemaService
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

    public function update($request)
    {
        $user = Auth::user();
        $user->tema_id = $request->tema_id;
        $user->update();
        return redirect("/users/temas");
    }
}