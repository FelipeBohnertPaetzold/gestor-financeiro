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
                Você está editando "Sua Senha"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-user"></i> Usuário</strong>
        </h2>

        <form method="POST" action="/users/alterar-senha/update" class="ls-form ls-box ls-box-gray ls-form-horizontal row">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$user->id}}">
            <fieldset>
                <label class="ls-label col-md-6 {{ $errors->has('password') ? ' ls-error' : '' }}">
                    <b class="ls-label-text">Senha atual</b>
                    <p class="ls-label-info">Digite sua senha</p>
                    <div class="ls-prefix-group">
                        <input type="password" maxlength="20" placeholder="Senha"
                               id="password_field"
                               name="password">
                        <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye"
                           data-toggle-class="ls-ico-eye, ls-ico-eye-blocked"
                           data-target="#password_field"
                           href="#">
                        </a>
                        @if ($errors->has('password'))
                            <small class="ls-help-message">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                </label>
                <label class="ls-label col-md-6 {{ $errors->has('new_password') ? ' ls-error' : '' }}">
                    <b class="ls-label-text">Nova senha</b>
                    <p class="ls-label-info">Digite sua nova senha</p>
                    <div class="ls-prefix-group">
                        <input type="password" required maxlength="20" placeholder="Senha"
                               id="password_field1"
                               name="new_password">
                        <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye"
                           data-toggle-class="ls-ico-eye, ls-ico-eye-blocked"
                           data-target="#password_field1"
                           href="#">
                        </a>
                        @if ($errors->has('new_password'))
                            <small class="ls-help-message">{{ $errors->first('new_password') }}</small>
                        @endif
                    </div>
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