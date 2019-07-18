<?php

require_once __DIR__.'/includes/config.php';

$app->logout();

?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
   <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/log/logout.css">
  <title>Logout</title>
</head>
<body>
  <?php
  $app->doInclude('comun/header.php');
  ?>

		<article id=main>


		<div id="containerlog">
		<h1>HASTA PRONTO</h1>
		</div>
		</article>

    <?php
  		$app->doInclude('comun/footer.html');
  		?>


	</body>

</html>
