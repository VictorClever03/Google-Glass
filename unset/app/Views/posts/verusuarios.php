<?php
use App\Helpers\Sessao;
use App\Helpers\Valida;
use App\Helpers\ResumirTexto;

?>
<?=Sessao::mensagem('post')?>
<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/post1.css">

<div id="div">
       <div id="div1">
           <span id="span">Minhas Postagens</span>
           <div>
            <a id="a" href="<?=URL?>post/cadastrar"> Escrever</a>
            <a id="a" href="<?=URL?>post/"> Todos</a>
            </div>
       </div>
       <div ><?php if(isset($dados['posts'])):?>
           <?php foreach($dados['posts'] as $posts):?>
            <div id="div3" style="position:relative; width:80%; left:10%;  text-align:center;  border: .5px solid grey; margin:15px; border-radius:3px;">
            <header id="h" style="background:#606060; padding:10px; text-align:left;">
                <?=$posts['titulo']?>
            </header>
            <div id="div2" style="	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 10px;">
    
            <span style="text-align:left;"><?=ResumirTexto::ResumirTexto($posts['mensagem'],10)?></span>
            <div>
                <?php
                 $texto = strip_tags(trim($posts['mensagem']));
                 $array = explode(' ', $texto);
                 $totalpalavras = count($array);
                if(10<$totalpalavras):?>
            <br><a id="a" href="<?=URL?>post/ver/<?=$posts['id']?>">mais</a><br>
            <br><a id="a" href="<?=URL?>post/editar/<?=$posts['id']?>">Editar</a><br>
             <form action="<?=URL?>post/deletar/<?=$posts['id']?>" method='post'><br>
                 <button id='a' type='submit'>Deletar</button>
             </form>
            <?php else:?>
            <br><a id="a" href="<?=URL?>post/editar/<?=$posts['id']?>">Editar</a><br>
             <form action="<?=URL?>post/deletar/<?=$posts['id']?>" method='post'><br>
                 <button id='a' type='submit'>Deletar</button>
             </form>
                 <?php endif;?>
            </div>
            </div>
            <footer id="f" style="padding:5px; background:#ddd; text-align:left;font-size:9pt; color:grey">Escrito no dia:<?=Valida::ANG($posts['criado_em'])?> 
            </footer>
        </div>
            <?php endforeach?> 
            <?php else:?>
                <span>Nenhum cadastrado</span>
            <?php endif;?>
       </div>
   </div>