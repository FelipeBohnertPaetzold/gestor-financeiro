<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimal-ui">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/3.8.5/stylesheets/locastyle.css">
    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <title>Gestor Financeiro</title>
</head>
<body class="{{Auth::user()->tema->chave_de_tema}}">
<div class="ls-topbar">

    <div class="ls-notification-topbar">

        <!-- Links de apoio -->
        <div class="ls-alerts-list">
            <a href="#" data-counter="8" data-ls-module="topbarCurtain"
               data-target="#ls-notification-curtain"></a>
            <a href="#"  data-ls-module="topbarCurtain" data-target="#ls-help-curtain"></a>
            <a href="#"  data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"></a>
        </div>

        <!-- Dropdown com detalhes da conta de usuário -->
        <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
            <a href="#" class="ls-ico-user">
                <span class="ls-name">Olá, {{ Auth::user()->name }}</span>
            </a>

            <nav class="ls-dropdown-nav ls-user-menu">
                <ul>
                    <li><a href="/users/meus-dados">Meus dados</a></li>
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
                <li @if($nav == "dashboard") class="ls-active" @endif><a href="/" class="ls-ico-dashboard"
                                                                         title="Resumo financeiro">Dashboard</a></li>
                <li @if($nav == "contas")class="ls-active"@endif>
                    <a href="#" class="ls-ico-stats" title="Contas">Contas</a>
                    <ul>
                        <li><a href="/contas/nova">Nova <i style="float: right" class="ls-ico-plus"></i></a></li>
                        <li><a href="/contas">Listar <i style="float: right"
                                                        class="ls-ico-list"></i></a></li>
                    </ul>
                </li>
                <li @if($nav == "depositos") class="ls-active" @endif><a href="/depositos" class="ls-ico-plus"
                                                                         title="Depósitos">Depósitos</a></li>
                <li @if($nav == "despesas") class="ls-active" @endif><a href="/despesas" class="ls-ico-minus"
                                                                        title="Despesas">Despesas</a></li>
                <li @if($nav == "agenda") class="ls-active" @endif><a href="/agenda" class="ls-ico-calendar"
                                                                      title="Liste suas despesas e as veja no calendário">Agenda de Despesas</a></li>
                <li @if($nav == "configuracoes") class="ls-active" @endif><a title="Mude o tema do seu gerenciador" class="ls-ico-paint-format" href="/users/temas">Aparência</a>
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

    @if (count($errors) > 0)
        <div class="ls-alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    @yield('content')
</main>
<script>
    Number.prototype.formatMoney = function (c, d, t) {
        var n = this,
            c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };
</script>
<!-- We recommended use jQuery 1.10 or up -->

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://assets.locaweb.com.br/locastyle/3.9.0/javascripts/locastyle.js" type="text/javascript"></script>
<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="/js/all.js"></script>
</body>
</html>
