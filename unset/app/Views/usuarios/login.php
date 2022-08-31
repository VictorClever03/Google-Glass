<?php

use App\Helpers\Sessao;
?>


<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/form.css">
<article id="noticia">
    <header id="cabecalho2">
        <hgroup>
            <h3>Login > Sessao</h3>
            <h1>Formulário de Login</h1>
            <h2>por Victor Clever</h2>
            <h3 class="direita">Atualizado em 05/Agosto/2022</h3>
        </hgroup>
    </header>
    <form method="post" action="<?= URL ?>Usuarios/login">
        <fieldset id="usuario">
            <legend> Faca o seu Login</legend>
           <?=Sessao::mensagem('usuario')?>
            
            <p><label for="email">
                    E-mail:</p>
            <p> <input type="email" name="email" id="email" size="20" maxlength="40" <?= $dados['erro_email'] ? "style='border-color:red ;'" : "";      ?> value="<?= $dados['email'] ?>"></label> <br>
                <span style="color:red; margin:35px;font-family:pre;"><?= $dados['erro_email'] ?></span>
            </p>

            <p><label for="senha">
                    Senha:</p>
            <p><input type="password" name="senha" id="senha" size="8" maxlength="8" placeholder="8 digitos" <?= $dados['erro_senha'] ? "style='border-color:red ;'" : "";      ?> value="<?= $dados['senha'] ?>"> <br>
                <span style="color:red; margin:35px;font-family:pre;"> <?= $dados['erro_senha'] ?></span>
            </p>
            
            
           <p>
           <button type="submit" name="log" value="login">login</button>
           <button><a href="<?= URL ?>usuarios/cadastrar" style="text-decoration: none; color:black;">cadastrar</a></button>
            </p>
        </fieldset>
    </form>