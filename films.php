<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE-Nuestras peliculas</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8" />
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/group/fonts.css">
  </head>


	<body>

    <?php
		$app->doInclude('comun/header.php');
		?>

		<span class="ir-arriba icon-arrow-up2"></span>
		<article>

		<?php
      $pel= new \es\ucm\fdi\aw\Pelicula();
			$pel->allFilms();
      ?>


		</article>

    <?php
		$app->doInclude('comun/footer.html');
		?>

		 <script src="http://code.jquery.com/jquery-latest.js"></script>
   		   <script src="<?php echo JS_PATH ?>/arriba.js"></script>
	</body>


	
</html>
