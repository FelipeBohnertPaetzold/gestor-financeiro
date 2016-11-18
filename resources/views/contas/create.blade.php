@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/contas">Contas</a></li>
        <li>Nova</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está criando uma "Nova Conta"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-stats"></i> Nova Conta</strong>
        </h2>

        <form method="POST" action="/contas/criar" class="ls-form ls-box ls-box-gray ls-form-horizontal row">
            {{ csrf_field() }}
            <fieldset>
                <label class="ls-label col-md-8 col-xs-12">
                    <b class="ls-label-text">Nome</b>
                    <p class="ls-label-info">Digite um nome para a conta</p>
                    <input type="text" name="nome" placeholder="Nome da conta" class="ls-field" required>
                </label>
                <label class="ls-label col-md-4 col-xs-12">
                    <b class="ls-label-text">Saldo</b>
                    <p class="ls-label-info">Digite o saldo para a conta</p>
                    <input type="text" name="saldo" placeholder="Saldo" class="ls-field" onKeyPress="return(MascaraMoeda(this,'','.',event))" required>
                </label>
                <label class="ls-label col-md-12 col-xs-12">
                    <b class="ls-label-text">Descrição</b>
                    <p class="ls-label-info">Digite uma descrição para a conta</p>
                    <input type="text" name="descricao" placeholder="Descrição" class="ls-field" required>
                </label>
            </fieldset>

            <div class="ls-actions-btn">
                <button class="ls-btn ls-btn-primary ls-ico-checkmark">Salvar</button>
                <a href="/contas" class="ls-btn-danger ls-ico-close">Cancelar</a>
            </div>
        </form>
    </div>
@endsection