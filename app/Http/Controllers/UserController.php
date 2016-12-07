<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function detalhes()
    {
        return $this->service->detalhes();
    }

    public function editarView()
    {
        return $this->service->editarView();
    }

    public function update(Request $request)
    {
        return $this->service->update($request);
    }

    public function alterarSenhaView()
    {
        return $this->service->alterarSenhaView();
    }
}
