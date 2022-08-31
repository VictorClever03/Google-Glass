<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Fotos extends Controller{
    public function index(){
        $this->view("paginas/fotos");
    }
}