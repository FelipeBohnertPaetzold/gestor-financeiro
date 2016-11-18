@extends('templates.app')

@section('content')
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você não tem acesso a "Esse Lugar"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-close"></i> Acesso negado</strong>
        </h2>
        <div class="ls-box ls-no-bg ls-box-error">
            <h1 class="ls-title-intro ls-ico-close">Que feio</h1>
            <p>Você não tem permissão para estar aqui</p>

            <p><strong>Você pode:</strong></p>
            <ol>
                <li>Verificar se digitou corretamente o endereço desejado.</li>
                <li>Retornar à <a href="/dashboard" class="ls-color-theme">página inicial.</a></li>
            </ol>
        </div>

    </div>
@endsection