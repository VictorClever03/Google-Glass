<?php 
use App\Helpers\Valida;
?>
<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/post1.css">
<div id="div3" style="position:relative; width:80%; left:10%;  text-align:center;  border: .5px solid grey; margin:15px; border-radius:3px;">
            <header id="h" style="background:#606060; padding:10px; text-align:left;">
                <?=$dados['posts']['titulo']?>
            </header>
            <div id="div2" style="	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 10px;">
    
            <span><?=$dados['posts']['mensagem']?></span>
            <div>
            <a id="a" href="<?=URL?>post/">voltar</a><br>
            <?php if($dados['posts']['idusuarios']==$_SESSION['usuario_id']):?>  

                 <br><a id='a' href='<?=URL?>post/editar/<?=$dados['posts']['idposts']?>'>Editar</a><br>
                 <form action="<?=URL?>post/deletar/<?=$dados['posts']['idposts']?>" method='post'><br>
                 <button id='a' type='submit'>Deletar</button>
             </form>
                 <?php endif;?>
                 
             
             </div>
            </div>
            <footer id="f" style="padding:5px; background:#ddd; text-align:left;font-size:9pt; color:grey">Escrito por: <?=$dados['posts']['nome']?><?php if($dados['posts']['nivel']==1):echo"(admin)";endif?> no dia: <?=Valida::ANG($dados['posts']['dataposts'])?> 
            </footer>
        </div>