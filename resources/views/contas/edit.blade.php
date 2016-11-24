@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/contas">Contas</a></li>
        <li><a href="/contas/{{$conta->id}}">{{$conta->nome}}</a></li>
        <li>Editar</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está editando a conta "{{$conta->nome}}"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-stats"></i> Contas</strong>
        </h2>

        <form method="POST" action="/contas/update" class="ls-form ls-box ls-box-gray ls-form-horizontal row">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$conta->id}}">
            <fieldset>
                <label class="ls-label col-md-12 col-xs-12">
                    <b class="ls-label-text">Nome</b>
                    <p class="ls-label-info">Digite um nome para a conta</p>
                    <input type="text" name="nome" value="{{$conta->nome}}" placeholder="Nome da conta" class="ls-field"
                           required>
                </label>
                <input type="hidden" name="saldo_atual" placeholder="Saldo" value="{{$conta->saldo_atual}}">
                <label class="ls-label col-md-12 col-xs-12">
                    <b class="ls-label-text">Descrição</b>
                    <p class="ls-label-info">Digite uma descrição para a conta</p>
                    <input type="text" name="descricao" value="{{$conta->descricao}}" placeholder="Descrição"
                           class="ls-field" required>
                </label>
            </fieldset>

            <div class="ls-actions-btn">
                <button class="ls-btn ls-btn-primary ls-ico-checkmark">Salvar</button>
                <a href="/contas/{{$conta->id}}" class="ls-btn-danger ls-ico-close">Cancelar</a>
            </div>
        </form>
    </div>
@endsection