<?php

namespace App\Controllers;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class Solicitar extends Controller
{
    public function __construct()
    {
        if(Sessao::restrito()):
            Url::redireciona('usuarios/login');
        endif;
    }
    public function index()
    {
        $this->view("paginas/solicitar");
    }
}
