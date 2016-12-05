<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimal-ui">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/3.8.5/stylesheets/locastyle.css">
    <link rel="stylesheet" type="text/css" href="/css/all.css">
</head>
<body class="{{Auth::user()->tema->chave_de_tema}}">
<div class="ls-topbar">

    <!-- Barra de Notificações -->
    <div class="ls-notification-topbar">

        <!-- Dropdown com detalhes da conta de usuário -->
        <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
            <a href="#" class="ls-ico-user">
                <span class="ls-name">Olá, {{ Auth::user()->name }}</span>
            </a>

            <nav class="ls-dropdown-nav ls-user-menu">
                <ul>
                    <li><a href="#">Meus dados</a></li>
                    <li><a href="#">Faturas</a></li>
                    <li><a href="#">Planos</a></li>
                    <li><a href="{{ url('/logout') }}">Sair</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <span class="ls-show-sidebar ls-ico-menu"></span>

    <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
        <a style="cursor: default" class="ls-ico-stats">
            <small>Gerencie suas finanças</small>
            Gestor Financeiro
        </a>
    </h1>

    <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>


<aside class="ls-sidebar">

    <div class="ls-sidebar-inner">
        <nav class="ls-menu">
            <ul>
                <li @if($nav == "dashboard") class="ls-active" @endif><a href="/" class="ls-ico-dashboard" title="Dashboard">Dashboard</a></li>
                <li @if($nav == "contas")class="ls-active"@endif>
                    <a href="#" class="ls-ico-stats" title="Contas">Contas</a>
                    <ul>
                        <li><a href="/contas/nova">Nova <i style="float: right" class="ls-ico-plus"></i></a></li>
                        <li><a href="/contas">Listar <i style="float: right"
                                                        class="ls-ico-list"></i></a></li>
                    </ul>
                </li>
                <li @if($nav == "depositos") class="ls-active" @endif><a href="/depositos" class="ls-ico-plus" title="Depositos">Depósitos</a></li>
                <li @if($nav == "despesas") class="ls-active" @endif><a href="/despesas" class="ls-ico-minus" title="Despesas">Despesas</a></li>
                <li @if($nav == "agenda") class="ls-active" @endif><a href="#" class="ls-ico-calendar" title="Agenda">Agenda</a></li>
                <li @if($nav == "configuracoes") class="ls-active" @endif>
                    <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
                    <ul>
                        <li><a href="/users/temas">Aparência <i style="float: right"
                                                                class="ls-ico-paint-format"></i></a></li>
                        <li><a href="#">Suporte <i style="float: right" class="ls-ico-envelop"></i></a></li>
                    </ul>
                </li>
            </ul>
        </nav>


    </div>
</aside>


<main class="ls-main ">
    @if (session('message'))
        <div class="ls-alert-success">
            {{session('message')}}
        </div>
    @endif
    @yield('content')
</main>

<!-- We recommended use jQuery 1.10 or up -->
<script src="/js/all.js"></script>
<script src="http://assets.locaweb.com.br/locastyle/3.9.0/javascripts/locastyle.js" type="text/javascript"></script>
</body>
</html>
