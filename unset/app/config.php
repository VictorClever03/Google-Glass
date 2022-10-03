<?php


define('APP', dirname(__FILE__));
define('PU', dirname(__DIR__).DIRECTORY_SEPARATOR."public");
define('URL', 'http://localhost:8080/unset/');
define('APP_NOME', 'Curso de PHP7 Orientado a Objectos e MVC' );
define('DB',[
    'HOST'=>'localhost',
    'PORT'=>'3306',
    'USER'=>'root',
    'PASS'=>'',
    'DBNAME'=>'unset',
    'SGBD'=>'mysql'
]);


// controlador
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
$url = trim(rtrim($url));
$url1 = explode('/', $url);
define('CONTROLADOR',$url1[0]);
