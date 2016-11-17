@extends('layouts.app')

@section('content')
    <div class="ls-login-parent">
        <div class="ls-login-inner">
            <div class="ls-login-container">
                <div class="ls-login-box">
                    <h1 class="ls-login-logo">Bem Vindo</h1>
                    <form role="form" class="ls-form ls-login-form" action="#">
                        <fieldset>

                            <label class="ls-label">
                                <b class="ls-label-text ls-hidden-accessible">Usuário</b>
                                <input class="ls-login-bg-user ls-field-lg" type="text" placeholder="Usuário" required
                                       autofocus>
                            </label>

                            <label class="ls-label">
                                <b class="ls-label-text ls-hidden-accessible">Senha</b>
                                <div class="ls-prefix-group">
                                    <input id="password_field" class="ls-login-bg-password ls-field-lg" type="password"
                                           placeholder="Senha" required>
                                    <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye"
                                       data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field"
                                       href="#"></a>
                                </div>
                            </label>

                            <p><a class="ls-login-forgot" href="forgot-password">Esqueci minha senha</a></p>

                            <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">
                            <p class="ls-txt-center ls-login-signup">Não possui um usuário? <a href="#">Cadastre-se
                                    agora</a></p>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">Login</div>--}}
    {{--<div class="panel-body">--}}
    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
    {{--{{ csrf_field() }}--}}

    {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

    {{--@if ($errors->has('email'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('email') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password" type="password" class="form-control" name="password" required>--}}

    {{--@if ($errors->has('password'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('password') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-6 col-md-offset-4">--}}
    {{--<div class="checkbox">--}}
    {{--<label>--}}
    {{--<input type="checkbox" name="remember"> Remember Me--}}
    {{--</label>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-8 col-md-offset-4">--}}
    {{--<button type="submit" class="btn btn-primary">--}}
    {{--Login--}}
    {{--</button>--}}

    {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
    {{--Forgot Your Password?--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
