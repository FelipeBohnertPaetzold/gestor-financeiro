@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li>Depósitos do mês</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo "Seus Depósitos do Mês"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-plus"></i> Depósitos</strong>
        </h2>

        <div style="margin-top: 30px; margin-bottom: 40px" class="ls-collapse-group">
            <div data-ls-module="collapse" data-target="#accordeon0" class="ls-collapse ">
                <a href="#" class="ls-collapse-header">
                    <h3 class="ls-collapse-title">Filtrar por data</h3>
                </a>
                <div class="ls-collapse-body" id="accordeon0">
                    <div class="ls-box ls-box-gray">
                        <form action="/depositos/filtro/data" class="ls-form ls-form-inline" method="POST"
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

        @if($data->count() > 0)
            <div style="float: right; margin-right: 20px; margin-top: 20px;">
                <span>Total <h3><strong color="">R$ {{number_format ( $total , 2 , "," , "." )}}</strong></h3></span>
            </div>
            <div class="ls-box">
                <h1 class="ls-title-2 ls-color-theme">Depósitos do Mês</h1>
                <table class="ls-table ls-table-striped ls-table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">Valor</th>
                        <th style="text-align: center">Criação</th>
                        <th style="text-align: center">Conta</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $deposito)
                        <tr>
                            <td class="quitada"
                                style="text-align: center"><span
                                        style="font-size: 12px;"></span><a
                                        href="/depositos/{{$deposito->id}}">R$ {{number_format ( $deposito->valor , 2 , "," , "." )}}</a>
                            </td>
                            <td style="text-align: center">{{date("d/m/Y - h:i:s A", strtotime($deposito->created_at))}}</td>
                            <td class="ls-color-theme" style="text-align: center">
                                <a href="/contas/{{$deposito->conta_id}}"><strong>{{$deposito->conta->nome}}</strong>
                            </td>
                            </a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="ls-alert-warning ls-dismissable">
                <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                <strong>Opssss!</strong> Você não fez depósitos esse mês.
            </div>
        @endif
    </div>
@endsection