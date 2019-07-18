<?php
  namespace es\ucm\fdi\aw;
  
  class Pelicula {

  
public function infoFilm(){
if(is_numeric($_GET['id'])){	  //FALTA cotejar que id no sea 0 Y LOS CLOSE()
    $app = App::getSingleton();
    $conn = $app->conexionBd();
	

    $sql = "
      SELECT id,nombre, urlyoutube, nombrefoto, descripcion, sinopsis
      FROM pelicula
      WHERE id = ".  $conn->real_escape_string($_GET['id']) .";";
	  
	  

      $result = $conn->query($sql);
      $row = $result->fetch_assoc();


      echo "<div class='enlacecab'><p> AB</p></div>";
      echo "<div class='titulocab'><h3>" . $row['nombre'] . "</h3></div>";
      echo "<div class='enlacecab'><p> CINES</p></div>";

      echo "<div class='media'>";
      echo "<div class='cartel'>";
      $var= $row['nombrefoto'];
      echo "<img src=" , '"' , IMG_PATH ,  $var , '"/>';
          
      echo "</div>";

      echo "<div class='trailer'>";
      echo "<iframe width='420' height='320' src = '". $row['urlyoutube']."' > </iframe>";
      echo "</div>";
      echo "</div>";


      echo "<div class='resumen'>";
      echo  $row['descripcion'];
      echo "</div>";


      echo "<div class='sinopsis'>";
      echo"<p>Sinopsis: " .  $row['sinopsis'] . " </p>";
      echo "</div>";

      echo "<div class='containercompra'>";
echo "<div class='containerslector'>";
 $result->free();
//$conn=$app->desconexionBd();
//$conn->close();

}
else echo 'ID incorrecta';


 }

  public function photoFilm(){
if(is_numeric($_GET['id'])){	  
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $id=$conn->real_escape_string($_GET['id']);
    $sql = "SELECT p.nombrefoto 
            FROM pelicula p
            WHERE p.id='$id'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    //$conn->close();
    echo IMG_PATH . $row['nombrefoto'];
	 $result->free();
//$conn=$app->desconexionBd();
//$conn->close();

}
else echo 'ID incorrecta';  
  }

  public function premierFilms(){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $sql = "SELECT *
            FROM pelicula
            WHERE preestreno = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row

      while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $var = $row['nombreFoto'];
        echo "<div class='pelicula' >";
        echo "<a href='pelicula-detalle.php?id=".$row['id']."'> <img src= '". IMG_PATH. $row['nombreFoto']."'/></a>";
        echo "</div>";
      }
    }
	$result->free();
	//$conn->close();
	//$conn=$app->desconexionBd();
	

  }

  public function allFilms(){
    echo "hola";
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $sql = "SELECT *
            FROM pelicula";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row

      while($row = $result->fetch_assoc()) {

        echo "<div class='pelicula' >";
        echo "<a href='pelicula-detalle.php?id=".$row['id']."'> <img src= ".IMG_PATH .$row['nombreFoto']. "></a>";
        echo "</div>";
      }
    }
	$result->free();
  }

  public function commonFilms(){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $sql = "SELECT *
            FROM pelicula
            WHERE comun = 1 AND preestreno = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row

      while($row = $result->fetch_assoc()) {

        echo "<div class='pelicula' >";
        echo "<a href='pelicula-detalle.php?id=".$row['id']."'> <img src= '". IMG_PATH. $row['nombreFoto']."'/></a>";
        echo "</div>";
      }
    }
		$result->free();
  }
 
}
  
?>
