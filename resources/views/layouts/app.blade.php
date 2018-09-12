<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimal-ui">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/3.8.5/stylesheets/locastyle.css">
    <title>Gestor Financeiro</title>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
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
</head>
<body class="ls-theme-turquoise">
<div class="ls-topbar">

    <!-- Barra de Notificações -->
    <div class="ls-notification-topbar">

        <!-- Links de apoio -->
        <div class="ls-alerts-list">
            <a href="#" data-ls-module="topbarCurtain" data-target="#ls-help-curtain"></a>
            <a href="#" data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"></a>
        </div>
    </div>

    <span class="ls-show-sidebar ls-ico-menu"></span>

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
