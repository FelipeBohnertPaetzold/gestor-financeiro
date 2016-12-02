<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 02/12/2016
 * Time: 14:21
 */

namespace App\Http\Services;


use Illuminate\Support\Facades\Auth;

class DashboardService
{
    public function viewDashboard(){

        $total_contas = 0;

        foreach (Auth::user()->contas as $conta) {
            $total_contas += $conta->saldo_atual;
        }

        return view('home.home', [
            'nav' => 'dashboard',
            'contas' => Auth::user()->contas,
            'total_contas' => $total_contas
        ]);
    }
}