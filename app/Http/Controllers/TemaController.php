<?php

namespace App\Http\Controllers;

use App\Http\Services\TemaService;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function __construct(TemaService $service)
    {
        $this->service = $service;
    }

    public function trocarTemaView()
    {
        return $this->service->trocarTemaView();
    }

    public function update(Request $request)
    {
        return $this->service->update($request);
    }
}
