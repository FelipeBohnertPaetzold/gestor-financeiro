@extends('layouts.app')

@section('content')
    <div class="ls-login-parent">
        <div class="ls-login-inner">
            <div class="ls-login-container">
                <div class="ls-login-box">
                    <h1 class="ls-login-logo">Bem Vindo</h1>
                    <form role="form" class="ls-form ls-login-form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="ls-label">
                                    <b class="ls-label-text">Email</b>
                                    <input class="ls-login-bg-user ls-field-lg" type="email" name="email"
                                           placeholder="Email" required
                                           autofocus>
                                </label>
                            </div>
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="ls-label">
                                    <b class="ls-label-text">Senha</b>
                                    <div class="ls-prefix-group">
                                        <input id="password_field" name="password"
                                               class="ls-login-bg-password ls-field-lg"
                                               type="password"
                                               placeholder="Senha" required>
                                        <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye"
                                           data-toggle-class="ls-ico-eye, ls-ico-eye-blocked"
                                           data-target="#password_field"
                                           href="#"></a>
                                    </div>
                                </label>
                            </div>

                            <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">
                            <p class="ls-txt-center ls-login-signup">Não possui um usuário? <a href="/register">Cadastre-se
                                    agora</a></p>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
