<?php

require_once __DIR__.'/includes/config.php';


?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>
      <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/user/user.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>
	
	
		<article>
		<?php
        if ($app->tieneRol('admin', '', '') || $app->tieneRol('user', '', 'Necesitas estar logueado') )
             {

      ?>
      
      <div class="profilePicture">
        <div class="pic">

          <?php

            if($_SESSION['foto'] != "static.jpg"){
              $var =".jpg";
              $foto ="";
              $foto = "userFolder/IMG/" . $_SESSION['foto'] . $var;
            }else{
              $foto = "";
              $foto = IMG_PATH . "static.jpg";
            }
            ?>
          <img src="<?php

          echo  $foto ;

          ?>"  alt="img" id="picture" height="184" width="289">
		  </div>
			<h><?php echo $_SESSION['username']?><h>
		  </div>
        </div>
      </div>

        <div class="user">
      <ul>
        <li> Nombre</li>
        <li> Apellidos</li>
        <li>  Teléfono </li>
        <li> Email </li>
        <li><a  href="uploadPhoto.php"></i> Cambiar foto de perfil</a></li>
        <li><a  href="cambiarPassword.php"></i>Cambiar contraseña </a></li>
        <li><a href="compras-realizadas.php">Mis tickets comprados</a></li>
      </ul>
        </div>

      <div class="info">
        <li> <?php echo $_SESSION['nombre'] ?> </li>
        <li> <?php echo $_SESSION['apellidos'] ?></li>
        <li>  <?php echo $_SESSION['tlf'] ?> </li>
        <li> <?php echo $_SESSION['username'] ?> </li>
		<?php
        if(isset($_SESSION['login']) && $_SESSION['login'] == true && $app->tieneRol('admin', '', '')){
            echo <<<END
			<li><a  href="administrador.php"></i>Administración </a></li>
END;
        }
          ?>

      </div>

      <?php
      }
      ?>
		</article>

	
    <?php
    $app->doInclude('comun/footer.html');
    ?>


	</body>

</html>
