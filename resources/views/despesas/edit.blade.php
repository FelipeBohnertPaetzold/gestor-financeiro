@extends('templates.app')

@section('content')

    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/despesas">Despesas</a></li>
        <li>Editar</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está editando uma "Despesa"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-minus"></i> Despesas</strong>
        </h2>
        <form method="POST" action="/despesas/update" class="ls-form ls-box ls-box-gray ls-form-horizontal row">
            {{ csrf_field() }}
            <fieldset>
                <input type="hidden" value="{{$despesa->id}}" name="id">
                <label class="ls-label col-md-8 col-xs-12">
                    <b class="ls-label-text">Nome</b>
                    <p class="ls-label-info">Digite um nome para a despesa</p>
                    <input type="text" name="nome" value="{{$despesa->nome}}" placeholder="Nome da despesa" autofocus
                           class="ls-field" required>
                </label>
                <label class="ls-label col-md-4 col-xs-12">
                    <b class="ls-label-text">Valor</b>
                    <p class="ls-label-info">Digite o valor da despesa</p>
                    <div class="ls-prefix-group">
                        <span class="ls-label-text-prefix">R$</span>
                        <input type="text" name="valor" value="{{$despesa->valor}}" placeholder="Valor" class="ls-field"
                               onKeyPress="return(MascaraMoeda(this,'','.',event))" required>
                    </div>
                </label>
                <label class="ls-label col-md-12 col-xs-12">
                    <b class="ls-label-text">Descrição</b>
                    <p class="ls-label-info">Digite uma descrição para a despesa</p>
                    <input type="text" name="descricao" value="{{$despesa->descricao}}" placeholder="Descrição"
                           class="ls-field" required>
                </label>
                <label class="ls-label col-md-4">
                    <b class="ls-label-text">Conta</b>
                    <p class="ls-label-info">Selecione a conta</p>
                    <div class="ls-custom-select">
                        <select class="ls-custom" required name="conta_id">
                            <option value="">Selecione a conta</option>
                            @foreach($contas as $conta)
                                <option @if($conta->id == $despesa->conta_id) selected
                                        @endif value="{{$conta->id}}">{{$conta->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </label>
                <label class="ls-label col-md-4">
                    <b class="ls-label-text">Data de vencimento</b>
                    <p class="ls-label-info">Informe o vencimento</p>
                    <div class="ls-prefix-group">
                        <span data-ls-module="popover" data-content="Escolha o período desejado e clique em 'Filtrar'."
                              data-target="#ls-popover-0"></span>
                        <input type="date" required name="data_vencimento" value="{{ $despesa->data_vencimento }}"
                               class="ls-field" placeholder="dd/mm/aaaa">
                        <a class="ls-label-text-prefix ls-ico-calendar" data-trigger-calendar="#datepicker1"
                           href="#"></a>
                    </div>
                </label>

                <label class="ls-label">
                    <div class="ls-prefix-group col-md-4">
                        <b class="ls-label-text">Cor</b>
                        <p class="ls-label-info">Informe a cor que aparecerá na agenda</p>
                        <input class="jscolor" value="{{$despesa->cor}}" name="cor" value="ab2567">
                    </div>
                </label>

                <label class="ls-label-text col-md-6">
                    <input @if($despesa->debito_automatico) checked @endif type="checkbox" name="debito_automatico" value="1">
                    Débito automático
                </label>
            </fieldset>


            <div class="ls-actions-btn">
                <button class="ls-btn ls-btn-primary ls-ico-checkmark">Salvar</button>
                <a href="/contas" class="ls-btn-danger ls-ico-close">Cancelar</a>
            </div>
        </form>
    </div>
@endsection