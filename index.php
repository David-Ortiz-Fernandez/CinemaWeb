<?php
require_once __DIR__.'/includes/config.php';
 ?>


<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE </title>

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

			<div class="slide">
				<ul>
					<li><a href="#"><img class="slideImg" src="<?php echo IMG_PATH ?>slide1.jpg" style="width:100%"></a></li>
					<li><a href="#"><img class="slideImg" src="<?php echo IMG_PATH ?>slide2.jpg" style="width:100%"></a></li>
					<li><a href="#"><img class="SlideImg" src="<?php echo IMG_PATH ?>slide3.jpg" style="width:100%"></a></li>
				</ul>
			</div>


			<div class="cabece"><h2>Peliculas en cartelera</h></div>

      <?php		

				$pel= new \es\ucm\fdi\aw\Pelicula();
				$pel->commonFilms();
        
      ?>

			<div class="cabece"><h2>Proximos Estrenos</h></div>

      <?php
        $pel->premierFilms();

      ?>

			<div class="cabece"><h2>Nuestras Promociones</h></div>
			<?php
				$prom= new \es\ucm\fdi\aw\Promos();
				$prom->listaFotoPromos();
			?>

			</div>

		</article>
		<?php
		$app->doInclude('comun/footer.html');
		?>

		   <script src="http://code.jquery.com/jquery-latest.js"></script>
   		   <script src="<?php echo JS_PATH ?>/arriba.js"></script>
	</body>
</html>
