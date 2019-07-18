<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE-Nuestras peliculas</title>
	<link id="estilo" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>/peliculas/estilofilm.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8" />
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">

  </head>


	<body>

    <?php
		$app->doInclude('comun/header.php');
		?>

		<article>

		 <?php
			
			$pel= new \es\ucm\fdi\aw\Pelicula();
			$pel->infoFilm();

			?>

     <select id='father'>

       <?php 
			 $ses= new \es\ucm\fdi\aw\Sesion(); 
			 $ses->cines();
			 
			 ?>


			</select>



			</div>
			 <div class='containerslector'>
				 <select id='child1'>
				 </select>


			 </div>
			 <div class='containerslector'>
				 <select id='child2'>


				 </select>

		
			 </div>

			 <div id='comprar' class='containerboton'>
    <input type="submit" 	value="comprar"  id="comprar"/>
    </div>
		</article>



		 		
		
    <script type="text/javascript" src="<?php echo JS_PATH ?>jquery-3.2.1.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH ?>selector.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH ?>comprar.js"></script>

	</body>
</html>
