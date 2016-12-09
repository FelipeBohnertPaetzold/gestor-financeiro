@extends('templates.app')

@section('content')

    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li>Todos os usuários</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo "Todos os Usuários"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-user"></i> Usuários</strong>
        </h2>

        <div class="ls-box">
            <table class="ls-table ls-table-striped ls-table-bordered">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th style="text-align: center">E-mail</th>
                    <th style="text-align: center">Criação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $user)
                    <tr>
                        <td class="ls-color-theme">{{$user->name}}</td>
                        <td style="text-align: center">{{$user->email}}</td>
                        <td style="text-align: center">{{date("d/m/Y - h:i:s A", strtotime($user->created_at))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection