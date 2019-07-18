<?php

  namespace es\ucm\fdi\aw;
  Class Cines {

  public function cine(){
      if(is_numeric($_GET['id'])){
    $app = App::getSingleton();
    $conn = $app->conexionBd();

    $sql = "SELECT c.info as c_info, c.nombre as c_nombre, c.email as c_email
            FROM cine c
            WHERE c.id = ". $conn->real_escape_string($_GET['id']) .";";


    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    echo "<div class='cine-contenedor'>";
    echo "<div class='cine-contenedor-header'>";
    echo " <h1>". $row['c_nombre'] ."</h1>";
    echo "</div>";
    echo "<div class='cine-contenedor-peliculas'>";
    echo"<div class='info-contenedor'>";
    echo "<div id='map'>";
    echo "<script src=" . JS_PATH . "map/map.js></script>";
    echo "<script async defer
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAdGQVp0iusUDU4LVpNde-wo6lrYzRhXhg&callback=initMap'>";
    echo "</script>";
    echo "</div>";
    echo "<div class='info-descripcion'>";
    echo"<h3>Información general:</h3>";   
    echo  $row['c_info']; 
    echo "<br>";
    echo "<a href='mailto:". $row['c_email'] ."?subject=feedback'>". $row['c_email'] ."</a>";         
    echo"</div>";
    echo"</div>";

    $sql = "SELECT distinct p.id AS p_id, p.nombre AS p_nombre, p.nombreFoto, p.sinopsis, f.fecha
            FROM cine c, sala s, sesion f, pelicula p
            WHERE c.id = s.idCine AND s.id = f.id_sala AND f.id_pelicula = p.id AND c.id = '". $conn->real_escape_string($_GET['id']) ."';";
    
	$result->free();	
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $nombre_pelicula_anterior = "";
      while($row = $result->fetch_assoc()) {
      $nombre_pelicula_ahora = $row['p_nombre'];

      if ($nombre_pelicula_ahora != $nombre_pelicula_anterior) {
          $nombre_pelicula_anterior = $nombre_pelicula_ahora;
          echo "<div class='pelicula-contenedor'>";
          echo "<h2>". $row['p_nombre'] ."</h2>";
          echo "<div class='pelicula-img'><a href='pelicula-detalle.php?id=".$row['p_id']."'> <img src= '". IMG_PATH. $row['nombreFoto']."'/></a></div>";
          echo "<div class='pelicula-detalles'>";
          echo $row['sinopsis'];
          echo "<p class=horarios>";
          echo"<br>";
          echo $row['fecha'];
          echo"<br>";      
    
          echo"</p>";
          echo"</div>";
         echo"</div>";
      }
    }

  }
	 $result->free();
    }
}

  public function cines(){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $sql = "SELECT c.nombre AS c_nombre, p.id AS p_id, p.nombre AS p_nombre, p.nombreFoto, p.sinopsis
          FROM cine c, sala s, sesion f, pelicula p
          WHERE c.id = s.idCine AND s.id = f.id_sala AND f.id_pelicula = p.id
          GROUP BY c.id, p.id
          ORDER BY c.id, p.id
          ";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      $nombre_cine_anterior = "";
      $boolCineAbierto = false;
      while($row = $result->fetch_assoc()) {

        $nombre_cine_ahora = $row['c_nombre'];

        if ($nombre_cine_ahora != $nombre_cine_anterior) {
          if ($boolCineAbierto) {
            echo "</div></div>";
          }
          $nombre_cine_anterior = $nombre_cine_ahora;
          $boolCineAbierto = true;
          echo "<div class='cine-contenedor'>";
          echo "<div class='cine-contenedor-header'><h1>" . $nombre_cine_ahora . "</h1></div>";
          echo "<div class='cine-contenedor-peliculas'>";
        }

        echo "<div class='pelicula-contenedor'><h2>" . $row['p_nombre'] . "</h2>";
        echo "<div class='pelicula-img'><a href='pelicula-detalle.php?id=" . $row['p_id'] . "'><img src='" . IMG_PATH. $row['nombreFoto'] . "'/></a></div>";

        echo "<div class='pelicula-detalles'><p>";
        echo $row['sinopsis'];
        //echo "</p><br><h4>Horarios:</h4><br><p class='horarios'>";
        //TODO ESTO HAY CAMBIAR LA TABLA DE FUNCION PARA OBTENER LOS HORARIOS.
        //echo "13:30<br>";
        echo "</p></div></div>";
      }
      echo "</div></div>";
    } else {
      echo "ERROR: 0 results";
    }
	 $result->free();
  }

  public function addCine($info,$nombre,$email){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
	
	
    $sql = ("INSERT INTO cine (nombre, info,email)
		VALUES ('".$conn->real_escape_string($nombre)."','".$conn->real_escape_string($info)."','".$conn->real_escape_string($email)."')");
    if ($conn->query($sql) === TRUE) {
		echo " Cine añadido correctamente.";
		//$conn->free();
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
  }

  public function listaNombreCines(){
     $app = App::getSingleton();
     $conn = $app->conexionBd();

     $sql = "SELECT c.nombre , c.id
            FROM cine c
            ";
     $result = $conn->query($sql);
       if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $nom = $row['nombre'];
            $id = $row['id'];
            echo "<li><a href='cines-detalle.php?id=".$id."'><i class='fa fa-map-marker'></i>".$nom."</a></li>";
          }
       }
	 $result->free();
  }
}
?>
