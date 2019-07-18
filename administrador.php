<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/admin/estilo-admin.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">

  </head>
	<body>
		<?php
			$app->doInclude('comun/header.php');
		?>
		<article id=main>
		<?php
			if ($app->tieneRol('admin', 'Acceso Denegado', 'No tienes permisos suficientes para administrar la web.')) {
		?>
  		
		<div class="containeradmin">
		<h1 class ="titulo">Opciones Administración</h1>
		<input id="botona" type="submit" value="Añadir pelicula" onclick="location.href='adminAddFilm.php'"/>
		<input id="botona" type="submit" value="Banear usuario" onclick="location.href='adminBan.php'"/>
		<input id="botona" type="submit" value="Añadir sala" onclick="location.href='adminAddSala.php'"/>
		<input id="botona" type="submit" value="Añadir cine" onclick="location.href='adminAddCine.php'"/>
		<input id="botona" type="submit" value="Añadir sesión" onclick="location.href='adminAddSesion.php'"/>
		</div>

		</article>
		<?php
		}
		?>

		<?php
  		$app->doInclude('comun/footer.html');
  		?>

	</body>
</html>


 
