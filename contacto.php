<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/formularios/estilo-contacto.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">

     <script language ="javascript">

    	function mgs(){

    		alert("Revisaremos su petición lo antes posible.")

    	}

    </script>


  </head>


	<body>
    <?php
		$app->doInclude('comun/header.php');
		?>


		<article id=main>


  		<!-- cinesAB@hotmail.com contraseña: 12345678Aa -->

  		<form class = "contact"  action="index.html"  onsubmit="mgs()" >

  		<h1 class ="titulo">Contacto </h1>


  		<p class="text"> Nos interesan mucho tus ideas, sugerencias y comentarios. </p>
  		<p class="text"> Para que tu mensaje llegue de la manera más directa posible a la persona responsable, rogamos uses el formulario. </p>
  		<p class="text"> Muchas gracias de antemano por tu tiempo. </p>

  		<hr>

  			<ol>
  				<li class ="cont">Indicanos el motivo de tu contacto</li>

  					<input type="radio" name="motivo" value="evaluacion"  required/> Evaluacion <br>
  					<input type="radio" name="motivo" value="sugerencias"  required/> Sugerencias <br>
  					<input type="radio" name="motivo" value="criticas"  required/> Criticas

  				<li class ="cont">Explicanos los detalles, por favor</li>

  					<select name="detalles"  required>
  					<option value="limpieza" >Limpieza</option>
  					<option value="tiempo de espera" >Tiempo de espera</option>
  					<option value="climatizacion salas" >Climatizacion salas</option>
  					<option value="mal servicio">Mal servicio</option>
  					<option value="problemas de proyeccion">Problemas de proyeccion</option>
  					<option value="otros">Otros</option>
  					</select>

  				<li class ="cont">Rellene los datos</li>

  					<fieldset>
  					<legend>Detalles:</legend>
  					Nombre: <input type="text" size="50"  required><br>
  					Email: <input type="text" size="50"  required><br>
  					Cine: <input type="text" size="20"  required>
  					Sala: <input type="text" size="20"  required>
  					Hora: <input type="text" size="5"  required><br>
  					</fieldset>

  				<li class ="cont">¿Cómo podemos ayudarte?</li>

  				  <textarea name="texto" rows="4" cols="50"> </textarea>

  				<li class ="cont" >Marque la casilla si acepta nuestros terminos de condiciones y servicios.</li>

  				  <input name="Acepto" type="checkbox" value="on" required /> Acepto </ol>

  				 <input type="submit" value="Enviar" />


  		</form>

		</article>
    <?php
  		$app->doInclude('comun/footer.html');
  		?>

	</body>

</html>
