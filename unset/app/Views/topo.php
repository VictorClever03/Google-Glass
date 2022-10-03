<header id="cabecalho">
   <?php use App\Helpers\DataActual;
   
   ?>
   <hgroup>
      <h1> Google
         Glass</h1>
      <h2>A revolução do Google está chegando</h2>
      <span style="font-size: 10pt;"><?= DataActual::dataActual();?></span>
      <h1 style="font-size: 20pt; margin-top:0px;"> <?php if (isset($_SESSION['usuario_id'])) : ?>
            Olá, <?= $_SESSION['usuario_nome']; ?><strong> seja bemvindo(a)</strong></h1>
   <?php else : ?>

      <img src="<?= URL ?>public/img/_imagens/glass-logo-peq.jpg" alt="Logo">

   <?php endif; ?>

   </hgroup>

   <?php if(CONTROLADOR=='especs'):?>

      <img id="oculo" src="<?= URL ?>public/img/_imagens/especificacoes.png">

   <?php elseif(CONTROLADOR=='fotos'):?>
      
      <img id="oculo" src="<?= URL ?>public/img/_imagens/fotos.png">
      
      <?php elseif(CONTROLADOR =='solicitar'):?>
         
         <img id="oculo" src="<?= URL ?>public/img/_imagens/contato.png">
         
         <?php elseif(CONTROLADOR=='post'):?>
            
            <img id="oculo" src="<?= URL ?>public/img/_imagens/video.png">
            
            <?php else:?>
               
               <img id="oculo" src="<?= URL ?>public/img/_imagens/glass-oculos-preto-peq.png">
               <?php endif;?>  

   <nav id="menu">
      <h1>Menu Principal</h1>
      <ul>
         <li onmouseover="mudafoto('home')" onmouseout="mudafoto('glass-oculos-preto-peq')"><a href="<?= URL ?>home"> Home</a></li>

         <li onmouseover="mudafoto('especificacoes')" onmouseout="mudafoto('<?php if(CONTROLADOR=='especs'):echo'especificacoes';?><?php else:echo'glass-oculos-preto-peq';?><?php endif;?>')"><a href="<?= URL ?>especs"> Especificações</a></li>

         <li onmouseover="mudafoto('fotos')" onmouseout="mudafoto('<?php if(CONTROLADOR=='fotos'):?>fotos<?php else:?>glass-oculos-preto-peq<?php endif;?>')"><a href="<?= URL ?>fotos"> Fotos</a></li>

         <?php if (isset($_SESSION['usuario_id'])) : ?>

            <li onmouseover="mudafoto('contato')" onmouseout="mudafoto('<?php if(CONTROLADOR=='solicitar'):?>contato<?php else:?>glass-oculos-preto-peq<?php endif;?>')"><a href="<?= URL ?>solicitar"> Solicitar</a></li>

            <li onmouseover="mudafoto('video')" onmouseout="mudafoto('<?php if(CONTROLADOR=='post'):?>video<?php else:?>glass-oculos-preto-peq<?php endif;?>')"> <a href="<?= URL ?>post">Posts</a></li>

            <li onmouseover="mudafoto('mao')" onmouseout="mudafoto('glass-oculos-preto-peq')"> <a href="<?= URL ?>Usuarios/sair" style="background-color: rgba(165, 42, 42, 0.902); color:white;">sair</a></li>

         <?php else : ?>
            <li><a href="<?= URL ?>Usuarios/login"> Entrar</a></li>
            <li><a href="<?= URL ?>usuarios/cadastrar"> Cadastre-se</a></li>
         <?php endif; ?>
      </ul>
   </nav>
</header>