<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Footer and header</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/promos/promos-detalle.css">

  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>

		<article id=main>

      <?php
      $prom= new \es\ucm\fdi\aw\Promos();
      $prom->viewPromo();
      ?>

    </article>

    <?php
		$app->doInclude('comun/footer.html');
		?>

	</body>

</html>
