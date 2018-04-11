<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage()
    {
        $title = "Homepage do Sistema Investindo";
        return view('index', [
            'title' => $title
        ]);
    }

    public function cadastrar()
    {
        // return view('cadastro');
    }

    public function login()
    {
        return view('user.login');
    }
}
