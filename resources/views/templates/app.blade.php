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

        <!-- Links de apoio -->
        <div class="ls-alerts-list">
            <a href="#" class="ls-ico-bell-o" data-counter="8" data-ls-module="topbarCurtain"
               data-target="#ls-notification-curtain"><span>Notificações</span></a>
            <a href="#" class="ls-ico-bullhorn" data-ls-module="topbarCurtain" data-target="#ls-help-curtain"><span>Ajuda</span></a>
            <a href="#" class="ls-ico-question" data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"><span>Sugestões</span></a>
        </div>

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
                <li><a href="/dashboard" class="ls-ico-dashboard" title="Dashboard">Dashboard</a></li>
                <li>
                    <a href="#" class="ls-ico-stats" title="Contas">Contas</a>
                    <ul>
                        <li><a href="/contas/nova">Nova <i style="float: right" class="ls-ico-plus"></i></a></li>
                        <li><a href="/contas">Listar <i style="float: right"
                                                        class="ls-ico-list"></i></a></li>
                    </ul>
                </li>
                <li><a href="/depositos" class="ls-ico-plus" title="Depositos">Depósitos</a></li>
                <li><a href="/despesas" class="ls-ico-minus" title="Despesas">Despesas</a></li>
                <li><a href="#" class="ls-ico-calendar" title="Agenda">Agenda</a></li>
                <li>
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

<aside class="ls-notification">
    <nav class="ls-notification-list" id="ls-notification-curtain" style="left: 1716px;">
        <h3 class="ls-title-2">Notificações</h3>
        <ul>
            <li class="ls-dismissable">
                <a href="#">Blanditiis est est dolorem iure voluptatem eos deleniti repellat et laborum consequatur</a>
                <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
            </li>
            <li class="ls-dismissable">
                <a href="#">Similique eos rerum perferendis voluptatibus</a>
                <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
            </li>
            <li class="ls-dismissable">
                <a href="#">Qui numquam iusto suscipit nisi qui unde</a>
                <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
            </li>
            <li class="ls-dismissable">
                <a href="#">Nisi aut assumenda dignissimos qui ea in deserunt quo deleniti dolorum quo et
                    consequatur</a>
                <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
            </li>
            <li class="ls-dismissable">
                <a href="#">Sunt consequuntur aut aut a molestiae veritatis assumenda voluptas nam placeat eius ad</a>
                <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
            </li>
        </ul>
    </nav>

    <nav class="ls-notification-list" id="ls-help-curtain" style="left: 1756px;">
        <h3 class="ls-title-2">Feedback</h3>
        <ul>
            <li><a href="#">&gt; quo fugiat facilis nulla perspiciatis consequatur</a></li>
            <li><a href="#">&gt; enim et labore repellat enim debitis</a></li>
        </ul>
    </nav>

    <nav class="ls-notification-list" id="ls-feedback-curtain" style="left: 1796px;">
        <h3 class="ls-title-2">Ajuda</h3>
        <ul>
            <li class="ls-txt-center hidden-xs">
                <a href="#" class="ls-btn-dark ls-btn-tour">Fazer um Tour</a>
            </li>
            <li><a href="#">&gt; Guia</a></li>
            <li><a href="#">&gt; Wiki</a></li>
        </ul>
    </nav>
</aside>

<!-- We recommended use jQuery 1.10 or up -->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="/js/all.js"></script>
<script src="http://assets.locaweb.com.br/locastyle/3.9.0/javascripts/locastyle.js" type="text/javascript"></script>
</body>
</html>
