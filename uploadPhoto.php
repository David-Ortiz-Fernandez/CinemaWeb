<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/formularios/estilo-foto.css">

  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>

		<article >
      <?php
          if ($app->tieneRol('admin', '', '') || $app->tieneRol('user', '', 'Neceistas estar logueado') ){
      ?>

      <?php $formFoto = new \es\ucm\fdi\aw\FormularioFoto();
  		$formFoto->gestiona();
  		?>

  </article>

  <?php
  }
  ?>



    <?php
		$app->doInclude('comun/footer.html');
		?>

	</body>

</html>
