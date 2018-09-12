@extends('templates.app')

@section('content')
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
