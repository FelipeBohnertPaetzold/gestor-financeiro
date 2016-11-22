@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/">Início</a></li>
        <li>Contas</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está vendo "Suas Contas"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-stats"></i> Contas</strong>
        </h2>
        <a style="margin-bottom: 10px;" href="/contas/nova" class="ls-btn-primary ls-ico-plus">Adicionar conta</a>
        <div style="float: right; margin-right: 10px;">
            <span>Saldo total <h3><strong color="">{{$total}}</strong></h3></span>
        </div>
        <div class="ls-box">
            <table class="ls-table ls-table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th style="text-align: center">Saldo</th>
                    <th style="text-align: center">Criação</th>
                    <th style="text-align: center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $conta)
                    <tr>
                        <td><a href="/contas/{{$conta->id}}" title="Nome da conta">{{$conta->nome}}
                            </a><a href="/despesas" class="ls-tag-danger"> {{count($conta->despesasMes)}} Despesas</a></td>
                        <td class="@if($conta->saldo <= 0)vencido @else a-vencer @endif" style="text-align: center">{{number_format ( $conta->saldo , 2 , "," , "." )}}</td>
                        <td style="text-align: center">{{date("d/m/Y - h:i:s A", strtotime($conta->created_at))}}</td>
                        <td style="text-align: center">
                            <a href="/contas/editar/{{$conta->id}}" title="Editar" class="ls-ico-pencil"></a>
                            <a style="color: #db6664" href="/contas/deletar/{{$conta->id}}" title="Excluir"
                               class="ls-ico-remove"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection