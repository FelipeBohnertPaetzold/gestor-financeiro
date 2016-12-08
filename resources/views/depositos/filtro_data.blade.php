@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li>Despesas Filtradas</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo "Suas Despesas Filtradas"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-minus"></i> Despesas</strong>
        </h2>

        <a style="margin-bottom: 10px;" href="/despesas/nova" class="ls-btn-primary ls-ico-plus">Adicionar despesa</a>
        <div style="float: right; margin-right: 10px; margin-bottom: 20px;">
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
        <a href="/despesas" class="ls-btn ls-ico-shaft-left" style="margin-bottom: 20px;"> Sair do filtro</a>
        <p class="ls-float-right ls-float-none-xs ls-small-info">
            <strong>{{$inicial}}</strong> - <strong>{{$final}}</strong>
        </p>
        <div class="ls-box">
            <h1>Contas</h1>
            </header>
            <br/>
            @foreach($data as $conta)
                @if(count($conta->depositos) > 0)
                    <div style="margin-bottom: 50px;" data-ls-module="collapse" data-target="#{{$conta['id']}}"
                         class="ls-collapse ls-collapse-opened">
                        <a href="#" class="ls-collapse-header">
                            <h3 style="font-size: 25px;" class="ls-collapse-title">{{$conta['nome']}}</h3>
                        </a>
                        <div class="ls-collapse-body" id="{{$conta['id']}}">
                            <table class="ls-table ls-table-striped">
                                <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th style="text-align: center">Valor</th>
                                    <th style="text-align: center">Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($conta['attributes']) - 8 > 0)
                                    @for($i=0; $i < count($conta['attributes']) - 8 ; $i++)
                                        <tr>
                                            <td><a href="/depositos/{{$conta[" $i"]['id']}}"
                                                   title="Descricao do deposito">{{$conta[" $i"]['descricao']}}</a>
                                            </td>
                                            <td style="text-align: center" class="quitada">R$ {{number_format ( $conta[" $i"]['valor'] , 2 , "," , "." )}}</td>
                                            <td style="text-align: center" class="ls-color-theme">{{date("d/m/Y H:i:s A", strtotime($conta[" $i"]['created_at']))}}</td>
                                        </tr>
                                    @endfor
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection