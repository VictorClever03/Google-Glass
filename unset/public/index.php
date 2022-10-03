<?php
session_start();
ob_start();
use App\Helpers\Sessao;
use App\Libraries\Router;
include '../app/phperror.php';
include '../vendor/autoload.php';
include '../app/config.php';
// use App\Libraries\Conexao;
// $db= new conexao;
// $db->query("INSERT INTO usuarios (nome,email,senha) VALUES('victor','clever','123')");
// $db->executa();
if(strtolower(CONTROLADOR)!="admin"):?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_NOME?></title>
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/css/_css/estilo.css">
    <script type="text/javascript" src="<?=URL?>public/js/funcoes.js"></script>

</head>
<body >
<?php endif;?>

<?php
if(strtolower(CONTROLADOR)!="admin"):
   echo "<div id='interface'>";
include APP."\Views\\topo.php";
 endif;
$rota = new Router;
if(strtolower(CONTROLADOR)!="admin"):
    include APP."\Views\\rodape.php";
endif;

 ?> 

<?php if(strtolower(CONTROLADOR)!="admin"):?>
 </div>
</body>
</html>
<?php endif;?>


