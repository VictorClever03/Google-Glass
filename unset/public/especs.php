<?php 
require '../app/config.php';
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
	<meta charset="utf-8">
	<title>Texto Externo</title>
	<style >
		body::-webkit-scrollbar
		{
			display: none;
			overflow: hidden;
		}
		body{
			font-family: Arial,sans-serif;
			font-size: 10pt;
		}

		p{
			text-align: justify;
			text-indent: 20px;

		}
		article h1{
			font-size: 15pt;
			color: #ffffff;
			background-color: rgba(0,0,0,.5);
			padding: 5px;
			margin: 0px;
		}
		article h2{
			font-size: 13pt;
			color: #888888;
			margin: 0px;
		}
		article{
						margin-bottom: 800px;
		}
				
		img.img-dir{
			display: block;
			float: right;
			margin: 0px 0px 0px 10px;
		}


	</style>
</head>
<body>
	
		<article id="topo">
<h2>Clique sobre as áreas destacadas em vermelho</h2>
<img src="<?=URL?>public/img/_imagens/mao.png" alt="Mao apantando para esquerda">

</article>
<article id="tela">
 <h1>Tela</h2> 
 <h2>Como o mundo vai aparecer</h2> 
<p> De acordo com fontes próximas do Google, os óculos vão contar com uma pequena tela de LCD ou AMOLED na parte superior e em frente aos olhos do usuário. Com o uso de uma câmera e GPS, você pode se situar, assim como selecionar opções com o movimento da cabeça.</p>

<img src="<?=URL?>public/img/_imagens/det-tela.jpg" alt="tela do google glass">
</article>

<article id="camera">
 <h1>Câmera</h2> 
 <h2>Filme e fotografe a qualquer momento</h2>

<img class="img-dir" src="<?=URL?>public/img/_imagens/det-camera.jpg"  alt="camera do google glass">

<p> Com o Google Glass será possível tirar fotos com até 5 megapixels e gravar vídeos com 720 linhas de resolução. Os primeiros vídeos e fotos capturados com o aparelho já começaram a circular pela rede, mas até agora ninguém tem muitas informações técnicas.</p>
</article>

<article id="sensor">
   <h1> Sensores</h1>
   <h2>A sensibilidade de um simples óculos</h2> 
<p> Quem pensa que para comandar o Google Glass vai precisar de teclado e mouse, se engana redondamente. O dispositivo vem com vários tipos de sensores e microfones embutidos. Assim, para dar um comando, basta falar ou passar o dedo na lateral do óculos.</p>

<img src="<?=URL?>public/img/_imagens/det-touch.jpg" alt="sensor do google glass">
</article>

<article id="Gadgets">
   <h1>Bateria e Gadgets</h1>
   <h2>Quais são os dispositivos que complementam o Glass</h2>

<img class="img-dir" src="<?=URL?>public/img/_imagens/det-bateria.jpg"  alt="baterias e badgets do goolge glass">

<p> Segundo a própria Google, o Glass virá com uma bateria que tem autonomia suficiente para durar um dia inteiro. Apenas algumas atividades como videoconferências e longas filmagens vão exigir um pouco mais. Além disso ele vem com WiFi, Bluetooth, 3G/4G e muito mais.</p>
</article>
</body>
</html>