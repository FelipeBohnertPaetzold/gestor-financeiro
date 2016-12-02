@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está criando seu "Cadastro"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-user"></i> Cadastro</strong>
        </h2>
        <div style="margin-left: 30%;">
            <form class="ls-form-horizontal ls-box ls-box-gray col-md-6" role="form" method="POST"
                  action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="ls-label col-md-12">
                        <b class="ls-label-text">Nome</b>
                        <p class="ls-label-info">Digite seu nome completo</p>
                        <input type="text" autofocus name="name" placeholder="Nome e sobrenome" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </label>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="ls-label col-md-12">
                        <b class="ls-label-text">Email</b>
                        <p class="ls-label-info">Digite seu email</p>
                        <input type="email" name="email" placeholder="Email" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </label>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <fieldset>
                        <label class="ls-label col-md-12">
                            <b class="ls-label-text">Senha</b>
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
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </label>
                    </fieldset>
                </div>

                <div class="form-group">
                    <fieldset>
                        <label class="ls-label col-md-12">
                            <b class="ls-label-text">Confirmar senha</b>
                            <p class="ls-label-info">Digite sua senha</p>
                            <input type="password" name="password_confirmation" placeholder="Confirme sua senha"
                                   required>
                        </label>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="ls-btn-primary">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
