<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 18/11/2016
 * Time: 14:13
 */

namespace App\Http\Services;


use App\Conta;
use Illuminate\Support\Facades\Auth;

class ContaService
{
    public function __construct()
    {
        $this->conta = new Conta();
    }

    public function listaTodasView()
    {
        $data = $this->conta->contasDoUsuario(Auth::user());
        $value = 0;
        foreach ($data as $conta) {
            $value += $conta->saldo;
        }
        $total = number_format ( $value , 2 , "," , "." );
        return view('contas.index', [
            'data' => $data,
            'total' => $total
        ]);
    }

    public function detalhes($id)
    {
        $conta = $this->conta->find($id);
        if($conta->user_id != Auth::user()->id){
            return view('mensagens.negado');
        }
        return view('contas.detail', [
            'conta' => $conta
        ]);
    }

    public function criaNovaView()
    {
        return view('contas.create');
    }

    public function editarView($id)
    {
        $conta = $this->conta->find($id);
        if($conta->user_id != Auth::user()->id){
            return view('mensagens.negado');
        }
        return view('contas.edit', [
            'conta' => $conta
        ]);
    }

    public function store($request)
    {
        $request['user_id'] = Auth::user()->id;
        $this->conta->create($request->all());
        return redirect('/contas')->with('message',
            'Conta ' . $request['nome'] . ' criada com sucesso!'
        );
    }

    public function update($request)
    {
        $data = $request->all();
        $data['updated_at'] = date('Y-m-d H:i:s');
        $conta = $this->conta->find($request->id);
        if($conta->user_id != Auth::user()->id){
            return view('mensagens.negado');
        }
        $conta->update($data);
        return redirect('/contas/' . $request->id)->with('message',
                'Conta salva com sucesso!'
            );
    }

}