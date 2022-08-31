<?php
namespace App\Controllers;

use App\Helpers\Sessao;
use App\Libraries\Controller;

class Error extends Controller{
    public function index()
    {   
        $this->view('paginas/error');
        Sessao::mensagem('erro','Erro, pagina não encontrada','alerta');
        
        
    }
}