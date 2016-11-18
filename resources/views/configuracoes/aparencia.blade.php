@extends('templates.app')

@section('content')
    <ol class="ls-breadcrumb">
        <li><a href="/home">Início</a></li>
        <li>Aparencia</li>
    </ol>
    <div class="container-fluid">
        <h2 class="ls-title-intro">
            <span style="font-size: 20px; color: #8c8c8c">
                Você está alterando seu "Tema"!
            </span>
            <strong style="color: #8c8c8c; float: right"><i class="ls-ico-paint-format"></i> Temas</strong>
        </h2>
        <div class="col-md-12">
            <form style="margin-left: 20%;" method="POST" action="/users/temas/atualizar"
                  class="ls-form-horizontal ls-box ls-box-gray col-md-8">
                {{ csrf_field() }}
                <label class="ls-label">
                    <b class="ls-label-text">Tema</b>
                    <p class="ls-label-info">Escolha um tema</p>
                </label>
                <div class="ls-custom-select">
                    <select name="tema_id" class="ls-select">
                        @foreach($data as $tema)
                            <option @if($tema->id == Auth::user()->tema_id) selected
                                    @endif value="{{$tema->id}}"> {{$tema->nome}} </option>
                        @endforeach
                    </select>

                </div>
                <div>
                    <button type="submit" class="ls-btn-primary">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection