
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
    <form method="post" action="<?= URL ?>Usuarios/cadastrar">
        <fieldset id="usuario">
            <legend> Faça o seu Cadastro</legend>

            <p><label for="nome">
                    Nome:</p>
            <p> <input type="text" name="nome" id="nome " size="20" maxlength="30" placeholder="Nome Completo" <?= $dados['erro_nome'] ? "style='border-color:red ;'" : "" ?> value="<?= $dados['nome'] ?>"></label> <br>
                <span style="color:red; margin:35px;font-family:pre; "> <?= $dados['erro_nome'] ?></span>
            </p>

            <p><label for="email">
                    E-mail:</p>
            <p> <input type="email" name="email" id="email" size="20" maxlength="40" <?= $dados['erro_email'] ? "style='border-color:red ;'" : "";      ?> value="<?= $dados['email'] ?>"></label> <br>
                <span style="color:red; margin:35px;font-family:pre;"><?= $dados['erro_email'] ?></span>
            </p>

            <p><label for="senha">
                    Senha:</p>
            <p><input type="password" name="senha" id="senha" size="8" maxlength="8" placeholder="8 digitos" <?= $dados['erro_senha'] ? "style='border-color:red ;'" : "";      ?> value="<?= $dados['c_senha'] ?>"> <br>
                <span style="color:red; margin:35px;font-family:pre;"> <?= $dados['erro_senha'] ?></span>
            </p>

            <p><label for="c_senha">
                    Confirma senha: </p>
            <p><input type="password" name="c_senha" id="c_senha" size="8" maxlength="8" placeholder="8 digitos" <?= $dados['erro_c_senha'] ? "style='border-color:red ;'" : "";      ?> value="<?= $dados['c_senha'] ?>">
                <br>
                <span style="color:red; margin:35px;font-family:pre;"> <?= $dados['erro_c_senha'] ?></span>
            </p>

            <p><label for="data"> Data de Nascimento: <input type="Date" name="data" id="data" <?= $dados['erro_data'] ? "style='border-color:red ;'" : "";      ?> value="<?= $dados['data'] ?>"><br>
                    <span style="color:red; margin:35px;font-family:pre;"><?= $dados['erro_data'] ?></span>
            </p>
            <p>
                <button type="submit" name="cad" value="cadastrar">Cadastrar</button>
                <button><a href="<?= URL ?>usuarios/login" style="text-decoration: none; color:black;">login</a></button>
            </p>
        </fieldset>
    </form>