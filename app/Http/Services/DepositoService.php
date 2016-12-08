<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 02/12/2016
 * Time: 10:26
 */

namespace App\Http\Services;


use App\Conta;
use App\Deposito;
use Illuminate\Support\Facades\Auth;

class DepositoService
{
    public function __construct(ContaService $contaService)
    {
        $this->nav = "depositos";
        $this->deposito = new Deposito();
        $this->conta = new Conta();
        $this->contaService = $contaService;
    }

    public function listaTodosView()
    {
        $total = 0;
        foreach ($this->deposito->byMes(Auth::user()->id) as $deposito) {
            $total += $deposito->valor;
        }
        return view('depositos.index', [
            'data' => $this->deposito->byMes(Auth::user()->id),
            'total' => $total,
            'nav' => $this->nav
        ]);
    }

    public function filtroData($request)
    {
        $inicial = \DateTime::createFromFormat('d/m/Y', $request->inicial);
        $final = \DateTime::createFromFormat('d/m/Y', $request->final);

        $ini = $inicial->format('Y') . '-' . $inicial->format('m') . '-' . $inicial->format('d') . ' 00:00:00';
        $fin = $final->format('Y') . '-' . $final->format('m') . '-' . $final->format('d') . ' 00:00:00';

        $depositos = $this->deposito->byDate($ini, $fin, Auth::user()->id);
        $data = Auth::user()->contas->all();

        foreach ($data as $conta) {
            $posicao = 0;

            $valor = 0;
            foreach ($depositos as $deposito) {
                $valor += $deposito->valor;
                if ($conta->id == $deposito->conta_id) {

                    array_add($conta, " $posicao", $deposito);
                    $posicao++;
                }
            }
        }

        $total = number_format($valor, 2, ",", ".");

        return view('depositos.filtro_data', [
            'data' => $data,
            'total' => $total,
            'nav' => $this->nav,
            'inicial' => $request->inicial,
            'final' => $request->final
        ]);
    }


    public function detalhes($id)
    {
        $deposito = $this->deposito->find($id);
        if(!$this->verificaPermissaoDeposito($deposito)) {
            return view('mensagens.negado', [
                'nav' => 'negado'
            ]);
        }

        return view('depositos.detail', [
            'deposito' => $deposito,
            'nav' => $this->nav
        ]);
    }

    public function criarNovoView($conta_id)
    {
        $conta = $this->buscaContaPorId($conta_id);
        if (!$this->verificaPermissao($conta)) {
            return view('mensagens.negado', [
                'nav' => 'negado'
            ]);
        }
        return view('depositos.create', [
            'conta' => $conta,
            'nav' => $this->nav
        ]);
    }

    public function store($request)
    {
        $conta = $this->buscaContaPorId($request->conta_id);
        if (!$this->verificaPermissao($conta)) {
            return view('mensagens.negado', [
                'nav' => 'negado'
            ]);
        }
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $this->deposito->create($data);
        $conta->saldo_atual += $request->valor;
        $conta->update();

        return redirect('/depositos')->with('message', 'Deposito efetuado com sucesso!');
    }

    public function verificaPermissaoDeposito($deposito)
    {
        if($deposito->user_id == Auth::user()->id) {
            return true;
        }

        return false;
    }

    public function verificaPermissao($conta)
    {
        if ($conta->user_id == Auth::user()->id) {
            return true;
        }
        return false;
    }

    public function buscaContaPorId($id)
    {
        return $this->conta->find($id);
    }

}