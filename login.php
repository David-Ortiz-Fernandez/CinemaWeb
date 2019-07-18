<?php

require_once __DIR__.'/includes/config.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/formularios/estilo-login.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
     <script language ="javascript">

    	function mgs(){

    		alert("Bienvenido a ABCINE")

    	}

    </script>


  </head>
	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>

		<article id=main>
      <?php $formLogin = new \es\ucm\fdi\aw\FormularioLogin();
        $formLogin->gestiona();
        ?>
		</article>

    <?php
  		$app->doInclude('comun/footer.html');
  		?>
	</body>

</html>
