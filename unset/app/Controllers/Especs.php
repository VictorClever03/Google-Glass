<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Especs extends Controller{

    public function index(){
        $this->view("paginas/especific");
    }
}