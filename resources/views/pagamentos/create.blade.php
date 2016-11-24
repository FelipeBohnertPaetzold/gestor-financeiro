@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/despesas">Despesas</a></li>
        <li><a href="/despesas/{{$despesa->id}}">{{$despesa->nome}}</a></li>
        <li>Pagar</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está "Pagando uma Despesa"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-pencil2"></i> Pagamento</strong>
        </h2>
        {{--Descrição da despesa--}}
        <div data-ls-module="collapse" data-target="#0" class="ls-collapse ">
            <a href="#" class="ls-collapse-header">
                <h3 class="ls-collapse-title">Informações da despesa</h3>
            </a>
            <div class="ls-collapse-body" id="0">
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
                </div>
                <div class="ls-box ls-board-box">
                    <header class="ls-info-header">
                        <h2 class="ls-title-3">Descrição</h2>
                    </header>
                    <p class="ls-no-data">{{$despesa->descricao}}</p>
                </div>
            </div>
        </div>

        <div class="ls-box ls-box-gray" style="margin-top: 20px;">
            <header class="ls-info-header">
                <h2 class="ls-title-3">Opções de pagamento</h2>
            </header>
            <ul class="ls-tabs-nav">
                <li class="ls-active"><a data-ls-module="tabs" href="#track">Pagar tudo</a></li>
                <li><a data-ls-module="tabs" href="#laps">Pagar Parcial</a></li>
            </ul>
            <div class="ls-tabs-container">
                <div id="track" class="ls-tab-content ls-active">
                    <form action="/pagamentos/criar" class="ls-form ls-form-horizontal row" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="conta_id" value="{{$despesa->conta->id}}"
                               required>
                        <input type="hidden" name="valor"
                               value="{{$despesa->valor}}" required>
                        <input type="hidden" name="despesa_id" value="{{$despesa->id}}">
                        <fieldset>
                            <label class="ls-label col-md-6">
                                <b class="ls-label-text">Valor</b>
                                <p class="ls-label-info">Valor do pagamento</p>
                                <input type="text" disabled name="valor"
                                       value="{{number_format ( $despesa->valor , 2 , ".", "")}}" required>
                            </label>
                            <label class="ls-label col-md-6">
                                <b class="ls-label-text">Conta</b>
                                <p class="ls-label-info">Nome da conta</p>
                                <input type="text" disabled name="nomeDoBanco" value="{{$despesa->conta->nome}}"
                                       required>
                            </label>
                            <label class="ls-label col-md-6">
                                <b class="ls-label-text">Descrição</b>
                                <p class="ls-label-info">Informe uma descrição para o pagamento</p>
                                <input autofocus type="text" name="descricao" placeholder="Descrição" required>
                            </label>
                            <label class="ls-label col-md-6">
                                <b class="ls-label-text">Data de Pagamento</b>
                                <p class="ls-label-info">Informe a data do pagamento</p>
                                <input type="datetime-local" name="data_pagamento" value="{{date("Y-m-d\TH:i:s")}}" required>
                            </label>
                        </fieldset>
                        <div class="ls-actions-btn">
                            <button class="ls-btn ls-btn-primary ls-ico-checkmark">Pagar</button>
                            <a href="/despesas/{{$despesa->id}}" class="ls-btn-danger ls-ico-close">Cancelar</a>
                        </div>
                    </form>
                </div>
                <div id="laps" class="ls-tab-content">
                    <form action="/pagamentos/criar" class="ls-form ls-form-horizontal row" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="valor"
                               value="{{$despesa->valor}}">
                        <input type="hidden" name="conta_id" value="{{$despesa->conta->id}}">
                        <input type="hidden" name="despesa_id" value="{{$despesa->id}}">
                        <fieldset>
                            <label class="ls-label col-md-6">
                                <b class="ls-label-text">Valor</b>
                                <p class="ls-label-info">Valor do pagamento</p>
                                <input type="text" name="valor" onKeyPress="return(MascaraMoeda(this,'','.',event))"
                                       value="{{number_format ( $despesa->valor , 2 , ".", "")}}"
                                       required>
                            </label>
                            <label class="ls-label col-md-6">
                                <b class="ls-label-text">Conta</b>
                                <p class="ls-label-info">Nome da conta</p>
                                <input type="text" name="nomeDaConta" value="{{$despesa->conta->nome}}" required>
                            </label>
                            <label class="ls-label col-md-6">
                                <b class="ls-label-text">Descrição</b>
                                <p class="ls-label-info">Informe uma descrição para o pagamento</p>
                                <input type="text" name="descricao" placeholder="Descrição" required>
                            </label>
                            <label class="ls-label col-md-6">
                                <b class="ls-label-text">Data de Pagamento</b>
                                <p class="ls-label-info">Informe a data do pagamento</p>
                                <input type="datetime-local" name="data_pagamento" value="{{date("Y-m-d\TH:i:s")}}" required>
                            </label>
                        </fieldset>
                        <div class="ls-actions-btn">
                            <button class="ls-btn ls-btn-primary ls-ico-checkmark">Pagar</button>
                            <a href="/despesas/{{$despesa->id}}" class="ls-btn-danger ls-ico-close">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection