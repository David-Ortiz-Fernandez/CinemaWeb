<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Promociones ABCine</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/promos/promos-principal.css">
  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>

		<article id=main>
          <!--
      Este bloque es para 1 cine
      ==================================================================================================================
      -->
      <div class="cine-contenedor">

    
       <div class="todas-promociones">

          	<?php
              $promos= new \es\ucm\fdi\aw\Promos();
              $promos->listaPromos();

              echo $promos->searchPromo("4321");
             
              ?>


            <marquee class="tit1">ABCINE se reserva el derecho a modificar o cancelar el descuento durante el
			desarrollo de la misma si concurriesen circunstancias de fuerza mayor o caso fortuito
			que así lo impusiesen. Para cualquier consulta o problema en el uso de los cupones, puede ponerse en contacto con el Servicio de Atención al Cliente en el 902 453 453</marquee>

		</article>

    <?php
		$app->doInclude('comun/footer.html');
		?>

	</body>

</html>
