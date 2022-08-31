<?php
$url=URL."public/especs.php";

?>
<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/specs.css">
<section id="corpo-full">
	<article id="noticia">
<header id="cabecalho2">		
<hgroup>
    <h3>Glass > Especificações</h3>
    <h1>Raio-X no Google Glass</h1>
    <h2>por Gustavo Guanabara</h2>
    <h3 class="direita">Atualizado em 01/Maio/2013</h3>
</hgroup>
</header>
<p>Clique em qualquer área destacada da imagem para ter mais informações sobre os recursos do Google Glass. Qualquer ponto vermelho vai te levar a um lugar cheio de novas informações.<?=$url?> </p>
<section id="conteudo">
<img src="<?=URL?>public/img/_imagens/glass-esquema-marcado.jpg" usemap="#meumapa" />
<map name="meumapa">
	<area shape="poly" coords="182,219,264,209,264,242,184,255" href="<?=$url?>#tela" target="janelas">
	<area shape="circle" coords="156,242,11" href="<?=$url?>#camera" target="janelas">
	<area shape="circle" coords="75,50,11" href="<?=$url?>#Gadgets" target="janelas">
	<area shape="poly" coords="27,145,80,218,81,250,26,168" href="<?=$url?>#sensor" target="janelas">
</map>
<iframe src="<?=$url?>"  name="janelas" class="frame">
</iframe>
</section>
</article>
</section>
