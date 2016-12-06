<?php

namespace App\Http\Controllers;

use App\Http\Services\DespesaService;
use Illuminate\Http\Request;

class DespesaController extends Controller
{

    public function __construct(DespesaService $service)
    {
        $this->service = $service;
    }

    public function listaTodasView()
    {
        return $this->service->listaTodasView();
    }

    public function editarView($id)
    {
        return $this->service->editarView($id);
    }

    public function update(Request $request)
    {
        return $this->service->update($request);
    }

    public function buscaTodasAjax()
    {
        return $this->service->buscaTodasAjax();
    }

    public function detalhes($id)
    {
        return $this->service->detalhes($id);
    }

    public function debitoAutomatico()
    {
        $this->service->debitoAutomatico();
    }

    public function deletarView($id)
    {
        return $this->service->deletarView($id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function filtroData(Request $request)
    {
        return $this->service->filtroData($request);
    }

    public function criaNovaView()
    {
        return $this->service->criaNovaView();
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }
}
