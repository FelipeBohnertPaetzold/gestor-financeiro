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

        <div class="ls-box ls-board-box">
            <header class="ls-info-header">
                <h2 class="ls-title-3">Despesas do mês</h2>
            </header>
            <table class="ls-table ls-table-striped ls-table-bordered">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th style="text-align: center">Valor</th>
                    <th style="text-align: center">Vencimento</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Ações</th>
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
                        <td style="text-align: center">{{date("d/m/Y", strtotime($despesa->data_vencimento))}}</td>
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
                        <td style="text-align: center">
                            <a href="/despesas/editar/{{$despesa->id}}" title="Editar"
                               class="ls-ico-pencil"></a>
                            <a style="color: #db6664" href="/despesas/deletar/{{$despesa->id}}"
                               title="Excluir"
                               class="ls-ico-remove"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection