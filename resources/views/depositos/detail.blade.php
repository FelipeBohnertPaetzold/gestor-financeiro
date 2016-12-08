@extends('templates.app')

@section('content')

    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/depositos">Depósitos</a></li>
        <li>Depósito</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo "Um Depósito"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-plus"></i> Depósitos</strong>
        </h2>

        <div class="ls-box ls-board-box">
            <header class="ls-info-header">
                <h2 class="ls-title-3">Depósito</h2>
                <p class="ls-float-right ls-float-none-xs ls-small-info">Depositado em:
                    <strong>{{date("d/m/Y h:i A", strtotime($deposito->created_at))}}</strong></p>
            </header>
            <div id="sending-stats" class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="ls-box">
                        <div class="ls-box-head">
                            <h6 class="ls-title-4 ls-color-theme" style="font-weight: bold">Valor</h6>
                        </div>
                        <div class="ls-box-body">
                            <div style="font-weight: bold; font-size: 33px"
                                 class="quitada">{{number_format ( $deposito->valor , 2 , "," , "." )}}</div>
                        </div>
                        <div class="ls-box-footer">
                            <span class="ls-color-theme" style="font-weight: bold">R$</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="ls-box">
                        <div class="ls-box-head">
                            <h6 class="ls-title-4 ls-color-theme" style="font-weight: bold">Conta</h6>
                        </div>
                        <div class="ls-box-body">
                            <strong class="ls-color-theme" style="font-size: 30px">{{$deposito->conta->nome}}</strong>
                        </div>
                        <div class="ls-box-footer">
                            <a href="/contas/{{$deposito->conta->id}}" class="ls-btn ls-btn-sm">Ir para a conta</a>
                        </div>
                    </div>
                </div>
                @if($deposito->descricao)
                    <div class="col-sm-6 col-md-3">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4 ls-color-theme" style="font-weight: bold">Descrição</h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-color-theme">{{$deposito->descricao}}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection