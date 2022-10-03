<?php

use App\Helpers\Sessao;

?>
<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/form.css">
<script type="text/javascript">
    function calc_tot(){
        var qtd =parseInt(document.getElementById('cQtd').value);
        tot= qtd*1000;
        document.getElementById('cTot').value=tot;
    }
</script>
<section id="corpo-full">
    <article id="noticia">
<header id="cabecalho2">   
    <?php echo Sessao::mensagem('go')?>    
    
<hgroup>
    <h3>Fale Conosco > Contato</h3>
    <h1>Formulário de Contato</h1>
    <h2>por Gustavo Guanabara</h2>
    <h3 class="direita">Atualizado em 26/09/2022</h3>
</hgroup>
</header>
<form onclick="calc_tot()" method="post" action="<?=URL?>solicitar">

<fieldset id="mensagem">
<legend> Endereço do usuário</legend><br>
 <label for="cUrg"> Contacto: <br></label> <br><input placeholder="+244 999 999 999"  type="text" name="contacto" id="cUrg" <?= $dados['err_contacto'] ? "style='border-color:red ;'" : "";?> value="<?= $dados['contacto']?>"> <br>
   <span style="color:red; margin:35px;font-family:pre;"><?= $dados['err_contacto'] ?></span><br><br>

   <label for="cMen"> Localidade: <br><br></label><textarea name="local" id="cMen" cols="45" rows="2" placeholder="ex. Angola, Luanda-Cacuaco-villa" <?= $dados['err_local'] ? "style='border-color:red ;'" : "";?> ><?= $dados['local'] ?></textarea>
   <span style="color:red; margin:35px;font-family:pre;"><?= $dados['err_local'] ?></span>

</fieldset>
<fieldset id="pedido">
<legend> Quero um Google Glass</legend>
    <p><label for="cglass"><input type="checkbox" name="confirm" id="cglass" checked><span <?= $dados['err_on'] ? "style='color:red ;'" : "";?> >Gostaria de adquirir um Google Glass quando disponível</span></label></p>
    

    <p><label for="cor"> Grau Óptico: <input type="text" placeholder="-- -- --" name="grau" id="cor" value="<?= $dados['grau'] ?>" <?= $dados['err_grau'] ? "style='border-color:red ;'" : "";?> ></label></p>
    <span style="color:red; margin:35px;font-family:pre;"><?= $dados['err_grau'] ?></span>

    <p><label for="cQtd"> Quantidade: <input <?= $dados['err_qtd'] ? "style='border-color:red ; '" : "";?>  value="<?= $dados['qtd'] ?>" type="number" name="qtd" id="cQtd"  min="0" max="5"> </label></p>
    <span style="color:red; margin:35px;font-family:pre;"><?= $dados['err_qtd'] ?></span>

   <p><label for="cTot"> Preço Total: $ </label><input value="<?= $dados['preco'] ?>" type="text" name="preco" id="cTot" placeholder="Total a Pagar" size="8" readonly> </p>
   <!-- <span style="color:red; margin:35px;font-family:pre;"></span> -->

   <input type="submit" name="enviar" value="Enviar">
</fieldset>
</form>

</article>
</section>
