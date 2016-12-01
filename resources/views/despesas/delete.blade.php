@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/despesas">Despesas</a></li>
        <li><a href="/despesas/{{$despesa->id}}">{{$despesa->nome}}</a></li>
        <li>Excluir</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você deseja excluir a despesa "{{$despesa->nome}}"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-stats"></i> Despesas</strong>
        </h2>

        <div class="ls-actions-btn">
            <a href="/despesas/destroy/{{$despesa->id}}" class="ls-btn-danger ls-ico-close">Excluir</a>
            <a href="/contas" class="ls-btn ls-ico-left">Cancelar</a>
        </div>

        <div class="ls-box ls-board-box">
            <header class="ls-info-header">
                <h2 class="ls-title-3">{{$despesa->nome}}</h2>
                <p class="ls-float-right ls-float-none-xs ls-small-info">Adicionado em
                    <strong>{{date("d/m/Y h:i A", strtotime($despesa->created_at))}}</strong></p>
            </header>
            <div id="sending-stats" class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="ls-box">
                        <div class="ls-box-head">
                            <h6 class="ls-title-4">Valor</h6>
                        </div>
                        <div class="ls-box-body">
                            <strong>{{number_format ( $despesa->valor , 2 , "," , "." )}}</strong><span>R$</span>
                        </div>
                    </div>
                    <div class="ls-box-footer">

                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="ls-box">
                        <div class="ls-box-head">
                            <h6 class="ls-title-4">Status</h6>
                        </div>
                        <div class="ls-box-body">
                            @if($despesa->quitada)
                                <h2 class="quitada">Pago</h2>
                            @elseif(!$despesa->quitada && $despesa->data_vencimento == date('Y-m-d'))
                                <h2 class="vence-hoje">Vence hoje</h2>
                            @elseif(!$despesa->quitada && $despesa->data_vencimento < date('Y-m-d'))
                                <h2 class="vencido">Vencida</h2>
                            @elseif(!$despesa->quitada && $despesa->data_vencimento > date('Y-m-d'))
                                <h2 class="a-vencer">A vencer</h2>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="ls-box">
                        <div class="ls-box-head">
                            <h6 class="ls-title-4">Vencimento</h6>
                        </div>
                        <div class="ls-box-body">
                            <div class="col-xs-4">
                                <strong>{{date("d", strtotime($despesa->data_vencimento))}}</strong>
                                <small>dia</small>
                            </div>
                            <div class="col-xs-4">
                                <strong>{{date("m", strtotime($despesa->data_vencimento))}}</strong>
                                <small>mês</small>
                            </div>
                            <div class="col-xs-4">
                                <strong>{{date("y", strtotime($despesa->data_vencimento))}}</strong>
                                <small>ano</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($despesa->debito_automatico)
                <div class="ls-alert-info" style="margin-top: 10px;"><strong>Atenção:</strong> Essa despesa será
                    debitada automaticamente!
                </div>
            @endif
        </div>
        <div class="ls-box ls-board-box">
            <header class="ls-info-header">
                <h2 class="ls-title-3">Descrição</h2>
            </header>
            <p class="ls-no-data">{{$despesa->descricao}}</p>
        </div>

        @if($despesa->pagamentos->count() > 0)
            <div data-ls-module="collapse" data-target="#1" class="ls-collapse ">
                <a href="#" class="ls-collapse-header">
                    <h3 class="ls-collapse-title">Pagamentos</h3>
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
                        @foreach($despesa->pagamentos as $pagamento)
                            <tr>
                                <td><a href="/pagamentos/{{$pagamento->id}}"
                                       title="Descrição ome do pagamento">{{$pagamento->descricao}}</a>
                                </td>
                                <td class="vencido" style="text-align: center"><span
                                            style="font-size: 12px;">R$ </span>{{number_format ( $pagamento->valor , 2 , "," , "." )}}
                                </td>
                                <td style="text-align: center">
                                    <strong>{{date("d/m/Y h:i:s A", strtotime($pagamento->data_pagamento))}}</strong>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection