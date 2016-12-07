@extends('templates.app')

@section('content')

    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li><a href="/meus-dados">Meus dados</a></li>
        <li>Editar</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está editando "Seus Dados"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-user"></i> Usuário</strong>
        </h2>

        <form method="POST" action="/users/update" class="ls-form ls-box ls-box-gray ls-form-horizontal row">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$user->id}}">
            <fieldset>
                <label class="ls-label col-md-6 col-xs-12">
                    <b class="ls-label-text">Nome</b>
                    <p class="ls-label-info">Digite seu nome</p>
                    <input autofocus type="text" name="name" value="{{$user->name}}" placeholder="Nome" class="ls-field"
                           required>
                </label>
                <label class="ls-label col-md-6 col-xs-12 {{ $errors->has('email') ? ' ls-error' : '' }}">
                    <b class="ls-label-text">Email</b>
                    <p class="ls-label-info">Digite seu email</p>
                    <input type="email" name="email" value="{{$user->email}}" placeholder="Email" class="ls-field"
                           required>
                    @if ($errors->has('email'))
                        <small class="ls-help-message">{{ $errors->first('email') }}</small>
                    @endif
                </label>
            </fieldset>

            <div class="ls-actions-btn">
                <button class="ls-btn ls-btn-primary ls-ico-checkmark">Salvar</button>
                <a href="/users/meus-dados" class="ls-btn-danger ls-ico-close">Cancelar</a>
                <a href="/users/alterar-senha" class="ls-btn ls-btn-default ls-ico-cog">Alterar senha</a>
            </div>
        </form>
    </div>

@endsection