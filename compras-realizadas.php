<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/user/compras-realizadas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/footerHeader/estilo.css">
  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>


		<article>
		<div class="tickets-contenedor">
      <div class="tickets-contenedor-header">
        <h1>Mis tickets</h1>
      </div>
      <div class="tickets-lista-contenedor">

        <?php
          $compr = new \es\ucm\fdi\aw\Compra();
          $compr->viewCompras();
        ?>

      </div>
		</div>
		</article>


    <?php
    $app->doInclude('comun/footer.html');
    ?>
	</body>
</html>
