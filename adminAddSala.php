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

      <div class="main-container">
      <?php
			if ($app->tieneRol('admin', 'Acceso Denegado', 'No tienes permisos suficientes para administrar la web.')) {
		?>
        

        <div class="form-container">
          <?php
            $formAddSala = new es\ucm\fdi\aw\FormularioAgregarSala();
            $formAddSala->gestiona();
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