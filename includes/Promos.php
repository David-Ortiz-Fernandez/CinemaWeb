<?php
  namespace es\ucm\fdi\aw;
  class Promos{

  public function viewPromo(){  
    if(is_numeric($_GET['id'])){
      $app = App::getSingleton();
      $conn = $app->conexionBd();
      $sql = "SELECT nombre, descripcion, nombreFoto, activo
              FROM promocion
               WHERE id = ". $conn->real_escape_string($_GET['id']) .";";
          

      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      
      echo "<div class='promo-contenedor'>";
      echo "<h1>" . $row['nombre'] . "</h1>";
      echo "<div class='promo-img'>";
      $var = $row['nombreFoto'];
            
      echo '<img src="' , IMG_PATH , $var , '"/>';
      echo "</div>";
      echo "<div class='promo-descripcion'>";
      echo "<p>";
      echo  $row['descripcion'];
      echo "</p>";
      echo "</div>";
      echo "</div>";
    $result->free();
    }
  }

  public function listaNombresPromos(){
    $app = App::getSingleton();
     $conn = $app->conexionBd();

     $sql = "SELECT c.nombre , c.id
            FROM promocion c
            ";
     $result = $conn->query($sql);
       if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $nom = $row['nombre'];
            $id = $row['id'];
            echo "<li><a href='promociones-detalle.php?id=".$id."'><i class='fa fa-map-marker'></i>".$nom."</a></li>";
          }
       }
	   $result->free();

  }

  public function listaFotoPromos(){
     $app = App::getSingleton();
     $conn = $app->conexionBd();

     $sql = "SELECT c.nombreFoto , c.id
            FROM promocion c
            ";
     $result = $conn->query($sql);
       if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $nom = $row['nombreFoto'];
            $id = $row['id'];
            echo '<div class="promo">';
            echo "<a href='promociones-detalle.php?id=".$id."'><img src=".IMG_PATH."".$nom."></a>";
            echo "</div>";
          }
       }
	    $result->free();
  }
       
  public function searchPromo($code){
    
    if(isset($code) && !is_null($code)){
    
      $app = App::getSingleton();
      $conn = $app->conexionBd();

      $sql = "SELECT porcentaje
      FROM promocion 
      WHERE code=". $conn->real_escape_string($code) .";";
      
    
      $result=$conn->query($sql);
      if(!$result) return -1;
      $row = $result->fetch_assoc();
     
      if(isset($row['porcentaje'])){
        return $row['porcentaje'];
       }
      return -1;

    }
      return -1;
    

  }
  

  public function listaPromos(){
    $app = App::getSingleton();
    $conn = $app->conexionBd();

    $sql = "SELECT c.nombreFoto , c.id
           FROM promocion c
           ";
    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
           $nom = $row['nombreFoto'];
           $id = $row['id'];
           echo '<div class="promos-img">';
           echo "<a href='promociones-detalle.php?id=".$id."'><img src=".IMG_PATH."".$nom."></a>";
           echo "</div>";
         }
      }
     $result->free();
    }
  }

 ?>