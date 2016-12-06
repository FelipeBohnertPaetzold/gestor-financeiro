@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li>Despesas do mês</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo "Suas Despesas do Mês"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-minus"></i> Despesas</strong>
        </h2>

        <a href="/despesas/nova" class="ls-btn-primary ls-ico-plus">Adicionar despesa</a>
        <div style="float: right; margin-right: 10px;">
            <span>Total <h3><strong color="">{{$total}}</strong></h3></span>
        </div>


        <div style="margin-top: 30px; margin-bottom: 40px" class="ls-collapse-group">
            <div data-ls-module="collapse" data-target="#accordeon0" class="ls-collapse ">
                <a href="#" class="ls-collapse-header">
                    <h3 class="ls-collapse-title">Filtrar por data</h3>
                </a>
                <div class="ls-collapse-body" id="accordeon0">
                    <div class="ls-box ls-box-gray">
                        <form action="/despesas/filtro/data" class="ls-form ls-form-inline" method="POST"
                              data-ls-module="form">
                            {{ csrf_field() }}
                            <label class="ls-label col-md-5">
                                <p class="ls-label-info">Informe data inicial</p>
                                <div class="ls-prefix-group">
                                    <span data-ls-module="popover"
                                          data-content="Escolha o período desejado e clique em 'Filtrar'."></span>
                                    <input required type="date" name="inicial" class="datepicker ls-daterange"
                                           placeholder="dd/mm/aaaa" id="datepicker1" data-ls-daterange="#datepicker2">
                                    <a class="ls-label-text-prefix ls-ico-calendar" data-trigger-calendar="#datepicker1"
                                       href="#"></a>
                                </div>
                            </label>

                            <label class="ls-label col-md-5">
                                <p class="ls-label-info">Informe data final</p>
                                <div class="ls-prefix-group">
                                    <span data-ls-module="popover"
                                          data-content="Clique em 'Filtrar' para exibir  o período selecionado."></span>
                                    <input required type="date" name="final" class="datepicker ls-daterange"
                                           placeholder="dd/mm/aaaa" id="datepicker2">
                                    <a class="ls-label-text-prefix ls-ico-calendar" data-trigger-calendar="#datepicker2"
                                       href="#"></a>
                                </div>
                            </label>
                            <button style="margin-top: 31px;" type="submit" class="col-md-2 ls-btn-primary">Filtrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="ls-box">
            <h1>Contas</h1>
            <br/>
            @foreach($data as $conta)
                @if($conta->despesasMes->count() > 0)
                    <div style="margin-bottom: 50px;" data-ls-module="collapse" data-target="#{{$conta->id}}"
                         class="ls-collapse ls-collapse-opened">
                        <a href="#" class="ls-collapse-header">
                            <h3 style="font-size: 25px;" class="ls-collapse-title">{{$conta->nome}}</h3>
                        </a>
                        <div class="ls-collapse-body" id="{{$conta->id}}">
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
                                            @if(!$despesa->quitada)
                                                <a href="/despesas/editar/{{$despesa->id}}"
                                                   title="Editar"
                                                   class="ls-ico-pencil"></a>
                                            @endif
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
                @endif
            @endforeach
        </div>
    </div>
@endsection