<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/formularios/estilo-registro.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
     <script language ="javascript">

    	function mgs(){

    		alert("Cuenta registrada correctamente.")

    	}

    </script>
  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>
		<article id=main>


		<?php $formRegistro = new \es\ucm\fdi\aw\FormularioRegistro();
		$formRegistro->gestiona();
		?>

		<script type="text/javascript" src=<?php echo JS_PATH?> "jquery-3.2.1.js"></script>
		<script type="text/javascript" src=<?php echo JS_PATH?> "checkuser.js"></script>

  </article>
    <?php
		$app->doInclude('comun/footer.html');
		?>

	</body>

</html>
