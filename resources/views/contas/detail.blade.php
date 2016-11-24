@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/contas">Contas</a></li>
        <li>{{$conta->nome}}</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo a conta "{{$conta->nome}}"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-stats"></i> Contas</strong>
        </h2>
        <div class="ls-box ls-board-box">
            <header class="ls-info-header">
                <h2 class="ls-title-3">{{$conta->nome}} <a href="/contas/editar/{{$conta->id}}"
                                                           style="margin-left: 10px;" title="Editar"
                                                           class="ls-ico-pencil"></a></h2>
                <p class="ls-float-right ls-float-none-xs ls-small-info">Ultima atualização
                    <strong>{{date("d/m/Y h:i A", strtotime($conta->updated_at))}}</strong></p>
            </header>
            <div id="sending-stats" class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="ls-box">
                        <div class="ls-box-head">
                            <h6 class="ls-title-4">Saldo</h6>
                        </div>
                        <div class="ls-box-body">
                            <strong>{{number_format ( $conta->saldo_atual , 2 , "," , "." )}}</strong></strong>
                            <span>R$</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="ls-box">
                        <div class="ls-box-head">
                            <h6 class="ls-title-4">Descrição</h6>
                        </div>
                        <div class="ls-box-body">
                            <p>{{$conta->descricao}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="ls-box">
                        <div class="ls-box-head">
                            <h6 class="ls-title-4">Criação</h6>
                        </div>
                        <div class="ls-box-body">
                            <div class="col-xs-4">
                                <strong>{{date("d", strtotime($conta->created_at))}}</strong>
                                <small>dia</small>
                            </div>
                            <div class="col-xs-4">
                                <strong>{{date("m", strtotime($conta->created_at))}}</strong>
                                <small>mês</small>
                            </div>
                            <div class="col-xs-4">
                                <strong>{{date("y", strtotime($conta->created_at))}}</strong>
                                <small>ano</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-ls-module="collapse" data-target="#0" class="ls-collapse ls-collapse-opened">
            <a href="#" class="ls-collapse-header">
                <h3 class="ls-collapse-title">Despesas do mês ({{count($conta->despesasMes)}})</h3>
            </a>
            <div class="ls-collapse-body" id="0">
                <table class="ls-table ls-table-striped ls-table-bordered">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th style="text-align: center">Valor</th>
                        <th style="text-align: center">Vencimento</th>
                        <th style="text-align: center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($conta->despesasMes as $despesa)
                        <tr>
                            <td><a href="/despesas/{{$despesa->id}}"
                                   title="Nome da despesa">{{$despesa->nome}}</a>
                            </td>
                            <td class="vencido" style="text-align: center"><span
                                        style="font-size: 12px;">R$ </span>{{number_format ( $despesa->valor , 2 , "," , "." )}}
                            </td>
                            <td style="text-align: center"><strong>{{date("d/m/Y", strtotime($despesa->data_vencimento))}}</strong></td>
                            <td style="text-align: center">
                                @if($despesa->quitada)
                                    <span class="quitada">Pago</span>
                                @elseif(date('Y-m-d', strtotime($despesa->data_vencimento)) < date('Y-m-d'))
                                    <span class="vencido">Vencido</span>
                                @elseif(date('Y-m-d', strtotime($despesa->data_vencimento)) == date('Y-m-d'))
                                    <span class="vence-hoje">Vence hoje</span>
                                @elseif(date('Y-m-d', strtotime($despesa->data_vencimento)) > date('Y-m-d'))
                                    <span class="a-vencer">A vencer</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div data-ls-module="collapse" data-target="#1" class="ls-collapse ">
            <a href="#" class="ls-collapse-header">
                <h3 class="ls-collapse-title">Pagamentos do mes ({{count($conta->pagamentosMes)}})</h3>
            </a>
            <div class="ls-collapse-body" id="1">
                <table class="ls-table ls-table-striped ls-table-bordered">
                    <thead>
                    <tr>
                        <th>Descrição</th>
                        <th style="text-align: center">Valor</th>
                        <th style="text-align: center">Data de pagamento</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($conta->pagamentosMes as $pagamento)
                        <tr>
                            <td><a href="/pagamentos/{{$pagamento->id}}"
                                   title="Descrição ome do pagamento">{{$pagamento->descricao}}</a>
                            </td>
                            <td class="vencido" style="text-align: center"><span
                                        style="font-size: 12px;">R$ </span>{{number_format ( $pagamento->valor , 2 , "," , "." )}}
                            </td>
                            <td style="text-align: center">
                                <strong>{{date("d/m/Y h:i:s A", strtotime($pagamento->data_pagamento))}}</strong></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection