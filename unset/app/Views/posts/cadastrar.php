<?php

use App\Helpers\Sessao;
?>


<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/form.css">
<article id="noticia">
    <header id="cabecalho2">
        <hgroup>
            <h3>Posts > cadastrar</h3>
            <h1>Formulário de Cadastro de Posts</h1>
            <h2>por Victor Clever</h2>
            <h3 class="direita">Atualizado em 25/Agosto/2022</h3>
        </hgroup>
    </header>
    <link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/post2.css">
<ul id='ul'>

  <li id='li'><a  id="aa" class="q" href="<?=URL?>post">Posts</a></li>
  <li id='li'><a  id="aa"  >Cadastrar</a></li>
  

</ul>
    <form method="post" action="<?= URL ?>Post/cadastrar">
        <fieldset id="usuario">
            <legend> Escreva o seu post aqui</legend>
         
            
            <p><label for="titulo">
                   Titulo:</p>
            <p> <input type="text" placeholder="titulo" name="titulo" id="email" size="20" maxlength="40" <?= $dados['erro_titulo'] ? "style='border-color:red ;'" : "";?> value="<?= $dados['titulo'] ?>"></label> <br>
                <span style="color:red; margin:35px;font-family:pre;"><?= $dados['erro_titulo'] ?></span>
            </p>

            <p><label for="mensagem">
                Mensagem:
            </p>
            <p>
                <textarea  name="mensagem" id="cMen" cols="45" rows="5" placeholder="Escreva a sua mensagem" <?= $dados['erro_mensagem'] ? "style='border-color:red ;'" : "";?> ><?= $dados['mensagem'] ?></textarea>
                    <span style="color:red; margin:35px;font-family:pre;"> <?= $dados['erro_mensagem'] ?></span>
                     <br>
            </p>
            
            
           <p>
           <button type="submit" name="cad" value="Cadastrar" style="width: 90%;">Cadastar</button>
          
            </p>
        </fieldset>
    </form>