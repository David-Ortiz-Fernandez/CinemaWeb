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
      <h1 class ="titulo">Pantalla administrador </h1>
            <ul class="listado">
                    <li class ="cont">Lista de usuarios activos</li>
            </ul>
    
            <textarea name="name" readonly="readonly"><?php $admin=new \es\ucm\fdi\aw\Admin(); $admin->banUser();?></textarea>
        <?php $formBaneo = new \es\ucm\fdi\aw\FormularioBaneo();
            $formBaneo->gestiona();
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
