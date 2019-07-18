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
      <div class="main-container">

        

        <div class="form-container">
          <?php
            $formAddSesion = new es\ucm\fdi\aw\FormularioAgregarSesion();
            $formAddSesion->gestiona();
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