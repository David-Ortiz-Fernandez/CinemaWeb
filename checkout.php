<?php

require_once __DIR__.'/includes/config.php';


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Footer and header</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/checkout/checkout.css">
  <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/checkout/seats.css">
  <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
  <script src="<?php echo JS_PATH ?>jquery-3.2.1.js" ></script>
    <meta charset="utf-8" />
  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>

		<article>

      <?php 
        $ses = new \es\ucm\fdi\aw\Sesion();
        if(!isset($_GET['sesion']) || !$ses->existeSesion($_GET['sesion'])){
          echo "Parámetros inválidos";
          die;
        }
        if (   $app->tieneRol('admin', '', '') || $app->tieneRol('user', '', 'Neceistas estar logueado') )
             { 
             

      ?> 

    
      </div>
      <div class="cover">
        <img src="<?php $pel= new \es\ucm\fdi\aw\Pelicula(); $pel->photoFilm(); ?>" alt="movieCover" width="320" height="320" >
      </div>

      <div class="seats" >
          
      </div>
      <div class="shopMenu">
        <ul>
          <li><a  href="#"></i>Comprar</a> </li>
        </ul>
      </div>

      <p>Código de descuento: <input type='text' id="codigo" name='codigo'  placeholder='Código' size='4'/></p>
      <?php
             }
       ?>
		</article>
    
    <?php
		$app->doInclude('comun/footer.html');
		?>
    <script src="<?php echo JS_PATH ?>jquery-3.2.1.js" ></script>
    <script src="<?php echo JS_PATH ?>seats.js" ></script>
    
	</body>
    
</html>
