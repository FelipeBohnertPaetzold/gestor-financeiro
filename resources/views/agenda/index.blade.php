@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li>Agenda</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo sua "Agenda de Despesas"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-calendar"></i> Agenda</strong>
        </h2>

        <div class="ls-box">
            <div id="calendar"></div>
        </div>
    </div>
@endsection
