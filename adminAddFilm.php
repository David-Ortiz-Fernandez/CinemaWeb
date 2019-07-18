<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
  <head>
  <title>ABCINE</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/admin/estilo-añadir.css">
  <meta charset="utf-8" />
  <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
  <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/admin/estilo-admin.css">
  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>

		<article id=main>
    <?php
			if ($app->tieneRol('admin', 'Acceso Denegado', 'No tienes permisos suficientes para administrar la web.')) {
		?>
      <div class="main-container">

        <h2 class ="form-titulo">Añadir Pelicula</h2>

        <div class="form-container">
          <?php
            $formAddPeli = new \es\ucm\fdi\aw\FormularioAgregarPeli();
            $formAddPeli->gestiona();
          ?>
        </div>


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
