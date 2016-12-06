@extends('templates.app')

@section('content')

    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li>Meus dados</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo "Seus Dados"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-user"></i> Usuário</strong>
        </h2>

        <div class="ls-box ls-board-box ls-box-gray">
            <header class="ls-info-header">
                <h2 class="ls-title-3">Seus dados</h2>
                <p class="ls-float-right ls-float-none-xs ls-small-info">
                    Criado em <strong>{{date("d/m/Y h:i A", strtotime($user->created_at))}}</strong>
                </p>
            </header>
            <div class="col-md-12">

                <strong>Nome: <span class="ls-color-theme"> {{$user->name}}</span></strong>
                <hr/>
                <strong>Email: <span class="ls-color-theme"> {{$user->email}}</span></strong>
                <hr/>
                <strong>Tema: <span class="ls-color-theme"> {{$user->tema->nome}}</span></strong>

            </div>
        </div>

        <div class="ls-box ls-board-box ls-box-gray">
            <header class="ls-info-header">
                <h2 class="ls-title-3">Suas contas</h2>
            </header>
            <div class="col-md-12">
                @foreach($user->contas as $conta)
                    <strong>Nome: <span class="ls-color-theme"> {{$conta->nome}}</span></strong>
                    <strong class="float-right">Saldo: <span class="ls-color-theme"> R$ {{number_format ( $conta->saldo_atual , 2 , "," , "." )}}</span></strong>
                    <hr/>
                @endforeach
            </div>
        </div>
    </div>

@endsection