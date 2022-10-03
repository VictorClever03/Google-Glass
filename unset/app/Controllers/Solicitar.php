<?php

namespace App\Controllers;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class Solicitar extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model= $this->model('Pedidos');
        if(Sessao::restrito()):
            Url::redireciona('usuarios/login');
        endif;
    }
    public function index()
    {   
        $formulario=filter_input_array(INPUT_POST,FILTER_DEFAULT);
        // var_dump($formulario);
        if(isset($formulario['enviar'])):
        $dados=[
            'contacto'=>trim($formulario['contacto']),
            'local'=>trim($formulario['local']),
            'grau'=>trim($formulario['grau']),
            'preco'=>trim($formulario['preco']),
            'qtd'=>trim($formulario['qtd']),
            'err_qtd'=>'',
            'id'=>$_SESSION['usuario_id'],
            'err_on'=>'',
            'err_grau'=>'',
            'err_local'=>'',
            'err_contacto'=>''
        ];
        if(in_array("",$formulario)):
            if(empty($formulario['contacto'])):
                $dados['err_contacto']='Preencha o campo contacto*';
            endif;
            if(empty($formulario['local'])):
                $dados['err_local']='Porfavor informe a sua localidade*';
            endif;
            if(empty($formulario['grau'])):
                $dados['err_grau']='Porfavor informe o grau da lente*';
            endif;
            if(empty($formulario['confirm'])):
                $dados['err_on']='kk';
            endif;
            if($formulario['qtd']==0 OR empty($formulario['qtd'])):
                $dados['err_qtd']='Preencha uma quantidade válida*';
            endif;
        else:
            $armazenar= $this->model->armazenarP($dados);
            if($armazenar):
                Sessao::mensagem('usuarios','Pedido enviado com sucesso');
                Url::redireciona('home');
            else:
                Sessao::mensagem('go','Erro com a model Pedidos->armazenaP','alerta');
            endif;
            // echo'<br>';
            // var_dump($dados);
            // var_dump($formulario);
        endif;
        else:
            $dados=[
                'contacto'=>'',
                'local'=>'',
                'grau'=>'',
                'preco'=>'',
                'qtd'=>'',
                'err_qtd'=>'',
                'err_grau'=>'',
                'err_on'=>'',
                'err_local'=>'',
                'err_contacto'=>''
            ];
        
        endif;
        $this->view("paginas/solicitar",$dados);
    }
}
