@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li>DashBoard</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo seu "Resumo Financeiro"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-dashboard"></i> Dashboard</strong>
        </h2>

        @if(Auth::user()->contas->count() == 0)
            <div class="ls-box ls-lg-space ls-ico-plus ls-ico-bg">
                <h1 class="ls-title-1 ls-color-theme">Adicione uma conta e comece a usar</h1>
                <p>Comece agora: crie sua primeira conta e comece a controlar suas finanças.</p>
                <a class="ls-btn-primary" href="/contas/nova">Cadastrar minha primeira conta</a>
            </div>
        @else
            <div class="ls-box ls-board-box">
                <header class="ls-info-header">
                    <h2 class="ls-title-3">Contas</h2>
                    <p class="ls-float-right ls-float-none-xs ls-small-info">Total: <strong>R$ {{number_format ( $total_contas , 2 , "," , "." )}}</strong></p>
                </header>
                <div class="col-md-12">
                    @foreach($contas as $conta)
                        <div id="sending-stats" class="row">
                            <div class="col-md-3">
                                <div class="ls-box">
                                    <div class="ls-box-head">
                                        <h6 class="ls-title-4 ls-color-theme" style="font-weight: bold">{{$conta->nome}}</h6>
                                    </div>
                                    <div class="ls-box-body">
                                        @if($conta->saldo_atual >= 0)
                                            <strong><span
                                                        class="quitada" style="font-size: 30px">R$ {{number_format ( $conta->saldo_atual , 2 , "," , "." )}}</span></strong>
                                        @endif
                                        <small>Saldo</small>
                                    </div>
                                    <div class="ls-box-footer">
                                        <a href="/contas/{{$conta->id}}" class="ls-btn ls-btn-sm">Ir para conta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection