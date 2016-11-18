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
                <h2 class="ls-title-3">{{$conta->nome}} <a href="/contas/editar/{{$conta->id}}" style="margin-left: 10px;" title="Editar" class="ls-ico-pencil"></a></h2>
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
                            <strong>{{number_format ( $conta->saldo , 2 , "," , "." )}}</strong>
                        </div>
                        <div class="ls-box-footer">
                            <h6 class="ls-title-4">R$</h6>
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
    </div>
@endsection