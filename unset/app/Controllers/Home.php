<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Home extends Controller
{
    public function index()
    {
       $this->view("paginas/home") ;
       
    }
}