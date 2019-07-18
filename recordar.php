<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>

	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/formularios/estilo-recordar.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
    <meta charset="utf-8" />

    <script language ="javascript">

    	function mgs(){

    		alert("Enviaremos tu contraseña al correo alternativo de la cuenta.")

    	}

    </script>

  </head>


	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>

		<article id=main>

		<form class ="recovery" action ="index.php" onsubmit="mgs()">
				<h2 class ="title" > Recordar contraseña </h2>
				<input type="email" placeholder="Correo electronico" name="usuario" required="">
				<input type="text" placeholder="nombre de usuario" name ="clave" required="">
				<input type="submit" value="Aceptar" >

		</form>


		</article>

    <?php
		$app->doInclude('comun/footer.html');
		?>

	</body>

</html>
