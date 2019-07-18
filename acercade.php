<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ABCINE</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/cines/estilo-AcercaDe.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/footerHeader/estilo.css">
    <meta charset="utf-8" />


  </head>

	<body>
    <?php
  		$app->doInclude('comun/header.php');
  		?>

		<article id=main>

		<h1 id = "acerca" >Acerca De</h1>

		<h2 id = "titulo" >ABCine</h2>

			<div class="textot">
			<p class = "titulot" >ABCine Ayer y Hoy</p>
			<p>Más de 17 millones de espectadores y 300 películas estrenadas al año avalan el compromiso con el cine</p>
			<p>y la gestión de ABCine, empresa líder de exhibición cinematográfica en España. Actualmente, gestiona</p>
			<p>más de 500 pantallas del circuito español con más de 100.000 butacas en unas instalaciones que priman</p>
			<p>la comodidad del espectador, el servicio personalizado y la calidad de imagen y sonido. ABCine gestiona</p>
			<p>5 multicines repartidos por todo el territorio español. Hoy, miles de personas acuden a las salas</p>
			<p>de ABCine en busca de emoción, aventura, diversión... El esfuerzo de la empresa se ha traducido en una</p>
			<p>fidelidad y confianza por parte de los espectadores, que la compañía piensa seguir cultivando con la </p>
			<p>proyección del mejor cine y en las mejores condiciones. Todo este esfuerzo se ha traducido en una creciente</p>
			<p>fidelización de nuestros usuarios. El 100% de los cines ABCine están digitalizados y ABCine trabaja ya en  </p>
			<p>implementar en sus salas nuevas tecnologías audiovisuales, que permitan sumergirse a los espectadores en  </p>
			<p>las películas como nunca antes se había experimentado.Como el formato HFR 48 fps que permite un realismo </p>
			<p>de las imágenes y los movimientos parecido al que el ojo humano ve.</p>



			<p class="titulot" >Historia</p>
			<p>Los orígenes de ABCine se remontan al año 2010, ABCine es una empresa Española dedicada a la exhibición</p>
			<p>de películas. Es propiedad de Organización ABCines; con sede en Madrid.</p>
			<p>Es la cadena de salas cinematográficas más grande de España.</p>



			<p class="titulot" >Calidad traducida en fidelidad</p>
			<p>Con todo ello, ABCine	ha logrado lo más importante. Volver a atraer a los espectadores a las salas de cine y </p>
			<p>lograr recuperar un número de espectadores incluso superior al de los momentos anteriores a las crisis de público </p>
			<p>de los años 80. En estas fechas doradas, por ejemplo, 1973-74, se juntaban en pantalla estrenos como 2001 Odisea del </p>
			<p>Espacio, Gritos y Susurros, Amarcord, El Coloso en Llamas, Cabaret, La Gran Evasión... por sólo citar unas cuantos.</p>
			<p>En el pasado 2005, ELMO rompió todos los récords al recibir la visita de 22 millones de espectadores, lo que supuso</p>
			<p>unos ingresos de 148,8 millones de euros. El balance de todos los cines de ELMO/UCI en</p>
			<p>Europa en el 2005 dejó una facturación de 226,7 millones de euros.</p>

			</div>

		</article>

    <?php
  		$app->doInclude('comun/footer.html');
  		?>
	</body>

</html>
