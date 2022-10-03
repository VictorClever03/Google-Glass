<?php

use App\Helpers\ResumirTexto;
use App\Helpers\Sessao;
use App\Helpers\Valida;

?>
<?=Sessao::mensagem('post')?>
<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/post1.css">

<div id="div">
       <div id="div1">
           <span id="span">Postagens</span>
           <div>
            <a id="a" href="<?=URL?>post/cadastrar"> Escrever</a>
            <a id="a" href="<?=URL?>post/verusuarios"> Meus</a>
            </div>
       </div>
       <div><?php if(isset($dados['posts'])):?>
           <?php foreach($dados['posts'] as $posts):?>
            <div id="div3" style="position:relative; width:80%; left:10%;  text-align:center;  border: .5px solid grey; margin:15px; border-radius:3px;">
            <header id="h" style="background:#606060; padding:10px; text-align:left;">
                <?=$posts['titulo']?>
            </header>
            <div id="div2" style="	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 10px;">
    
            <span><?=ResumirTexto::ResumirTexto($posts['mensagem'],10)?></span>
            <a id="a" href="<?=URL?>post/ver/<?=$posts['idposts']?>">ver mais</a>
            </div>
            <footer id="f" style="padding:5px; background:#ddd; text-align:left;font-size:9pt; color:grey">Escrito por: <?=$posts['nome']?><?php if($posts['nivel']==1):echo"(admin)";endif?> no dia:         <?=Valida::ANG($posts['dataposts'])?> 
            </footer>
        </div>
            <?php endforeach?> 
            <?php else:?>
                <span>Nenhum cadastrado</span>
                <?php endif;?>
       </div>
   </div>