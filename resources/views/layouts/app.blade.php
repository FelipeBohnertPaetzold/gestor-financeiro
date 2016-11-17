<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/3.8.5/stylesheets/locastyle.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="ls-theme-gold">
<div class="ls-topbar">

    <!-- Barra de Notificações -->
    <div class="ls-notification-topbar">

        <!-- Links de apoio -->
        <div class="ls-alerts-list">
            <a href="#" data-ls-module="topbarCurtain" data-target="#ls-help-curtain"></a>
            <a href="#" data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"></a>
        </div>

        <!-- Dropdown com detalhes da conta de usuário -->
        <div  class="ls-dropdown ls-user-account">
            <a href="#" class="ls-ico-user">
            </a>
        </div>
    </div>

    <span class="ls-show-sidebar ls-ico-menu"></span>

    <a href="/locawebstyle/documentacao/exemplos//pre-painel"  class="ls-go-next"><span class="ls-text">Voltar à lista de serviços</span></a>

    <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
        <a href="home" class="ls-ico-stats">
            <small>Gerencie suas finanças</small>
            Gestor Financeiro
        </a>
    </h1>

    <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>


<aside class="ls-sidebar">
    <div class="ls-sidebar-inner">
        <a href="/locawebstyle/documentacao/exemplos//pre-painel"  class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>

        <nav class="ls-menu">
            <ul>
                <li>
                    <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
                    <ul>
                        <li><a href="#">Suporte <i style="float: right" class="ls-ico-envelop"></i></a></li>
                    </ul>
                </li>
            </ul>
        </nav>


    </div>
</aside>


<main class="ls-main ">
    @yield('content')
</main>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://assets.locaweb.com.br/locastyle/3.9.0/javascripts/locastyle.js" type="text/javascript"></script>
<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
