@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/depositos">Depósitos</a></li>
        <li>Novo</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está fazendo "Um Depósito"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-plus"></i> Depósitos</strong>
        </h2>

        <form method="POST" action="/depositos/criar" class="ls-form ls-box ls-box-gray ls-form-horizontal row">
            {{ csrf_field() }}
            <fieldset>
                <input type="hidden" name="conta_id" value="{{$conta->id}}">
                <label class="ls-label col-md-6 col-xs-12">
                    <b class="ls-label-text">Valor</b>
                    <p class="ls-label-info">Digite o valor do depósito</p>
                    <div class="ls-prefix-group">
                        <span class="ls-label-text-prefix">R$</span>
                        <input type="text" name="valor" placeholder="Valor" class="ls-field"
                               onKeyPress="return(MascaraMoeda(this,'','.',event))" required>
                    </div>
                </label>
                <label class="ls-label col-md-6">
                    <b class="ls-label-text">Conta</b>
                    <p class="ls-label-info">Nome da conta</p>
                    <input type="text" name="nome_conta" disabled value="{{$conta->nome}}" class="ls-field" required>
                </label>
                <label class="ls-label col-md-12 col-xs-12">
                    <b class="ls-label-text">Descrição</b>
                    <p class="ls-label-info">Digite uma descrição para o depósito</p>
                    <input type="text" name="descricao" placeholder="Descrição" class="ls-field">
                </label>
            </fieldset>


            <div class="ls-actions-btn">
                <button class="ls-btn ls-btn-primary ls-ico-checkmark">Salvar</button>
                <a href="/contas" class="ls-btn-danger ls-ico-close">Cancelar</a>
            </div>
        </form>
    </div>
@endsection