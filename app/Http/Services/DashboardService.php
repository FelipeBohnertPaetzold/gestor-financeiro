<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 02/12/2016
 * Time: 14:21
 */

namespace App\Http\Services;


use App\Despesa;
use Illuminate\Support\Facades\Auth;

class DashboardService
{
    public function viewDashboard(){

        $despesa = new Despesa();
        $despesas = $despesa->despesaMesByUserId(Auth::user()->id);
        $total_contas = 0;
        $total_despesas = 0;


        foreach ($despesas as $desp) {
            $total_despesas += $desp->valor;
        }

        foreach (Auth::user()->contas as $conta) {
            $total_contas += $conta->saldo_atual;
        }

        return view('home.home', [
            'nav' => 'dashboard',
            'contas' => Auth::user()->contas,
            'total_contas' => $total_contas,
            'despesas' => $despesas,
            'total_despesas' => $total_despesas
        ]);
    }
}