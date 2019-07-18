<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCine - Cine 1</title>
	   <link id="estilo" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>/cines/cines-detalle.css">
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta charset="utf-8" />
     
     <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">

  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>

		<article id=main>
 
    <?php
    $cin= new \es\ucm\fdi\aw\Cines();
    $cin->cine();
    ?>

		</article>

    <?php
		$app->doInclude('comun/footer.html');
		?>

	</body>
   
</html>
