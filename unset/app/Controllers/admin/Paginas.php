<?php
namespace App\Controllers\admin;
use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class paginas extends Controller{

    public static function home($a)
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        return $a;
    }

}