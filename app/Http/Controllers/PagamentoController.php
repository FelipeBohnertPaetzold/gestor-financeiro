<?php

namespace App\Http\Controllers;

use App\Http\Services\PagamentoService;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function __construct(PagamentoService $service)
    {
        $this->service = $service;
    }


}
