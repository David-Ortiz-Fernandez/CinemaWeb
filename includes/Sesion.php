<?php

  namespace es\ucm\fdi\aw;

    class Sesion { 


    public function cines(){  
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $sql2 = "
        SELECT *
        FROM	(SELECT c.nombre
                FROM pelicula p, sesion f, sala s, cine c
                WHERE p.id = f.id_pelicula AND f.id_sala = s.id AND s.idCine = c.id AND p.id = ".$conn->real_escape_string($_GET['id']).") as temp
        GROUP BY nombre;
        ";

        $result = $conn->query($sql2);

        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
        }
      }
		$result->free();
    }

    public function seats(){
        if ( !isset($_SESSION['username']) ) 
        {
                echo "error";
                die();
        }

        $app = App::getSingleton();
        $conn = $app->conexionBd();

       
        $ses= $_POST['sesion'];

        $sql2 = "SELECT s.filas , s.columnas 
                FROM sala s , sesion se
                WHERE s.id=se.id_sala AND se.id=$ses
                ";
        $result = $conn->query($sql2);
        $row = $result->fetch_assoc();
        $f = $row['filas'];
        $c = $row['columnas'];

        $sql2 = "SELECT fila , columna
                FROM compra
                WHERE id_funcion='$ses'";
    
        
        $result = $conn->query($sql2);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $numButaca = $row['fila'];
                $activo =  $row['columna'];
                $infoSeat[] = array('fila'=>$numButaca,'columna'=>$activo);
            }
        }
       
        $infoQuery = array('f'=>$f,'c'=>$c);
        $response['infoSala']=$infoQuery;
        if(isset($infoSeat) && !empty($infoSeat)){
        $response['seats']=$infoSeat;
		}
    
        echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_NUMERIC_CHECK);
		$result->free();
        
    }

    public function sala(){
        $app = App::getSingleton();
        $conn = $app->conexionBd();


        $cine = $conn->real_escape_string($_POST['cine']);
        $sql2 = "
        SELECT *
        FROM	(SELECT s.numSala
                FROM pelicula p, sesion f, sala s, cine c
                WHERE p.id = f.id_pelicula AND f.id_sala = s.id AND c.nombre='". $cine. "' AND s.idCine = c.id AND p.id = ".$conn->real_escape_string($_POST['pelicula']).") as temp
        GROUP BY numSala;
        ";

        $result = $conn->query($sql2);
        $send = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            array_push($send, $row['numSala']);
            }
        }


        echo implode(";", $send);
		$result->free();

    
    }

    public function hora(){
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $cine = $_POST['cine'];
        $id = $_POST['id'];
        $sala = $_POST['sala'];
        $sql2 = "
        SELECT f.fecha ,f.id
        FROM sesion f , sala s , cine c
        WHERE id_pelicula='$id' AND s.numSala='$sala' and c.nombre='$cine' and f.id_sala=s.id and s.idCine=c.id
            ";

        $result = $conn->query($sql2);
        //echo $sql2;
        $send = array();

            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat = date('j / F / G : i  A',strtotime($row['fecha']));
                $send[]=array('id'=>$row['id'],'fecha'=>$dat);
            }
            }
        
        //$result->close();
        header('Content-Type: application/json');
        echo json_encode($send, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
		$result->free();
    }

    public function addSesion($sala,$film,$fecha,$precio){
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $die=false;
      
		if (is_numeric($sala)&&(is_numeric($film))&&(is_numeric($precio))){
			
			$sala = (int)$sala;
			$film = (int)$film;
			
        $sqlFecha =("SELECT fecha
                    FROM sesion
                    WHERE fecha='$fecha'");
       
        $result = $conn->query($sqlFecha);
        $row = $result->fetch_assoc();
        $fech=$row['fecha'];

      
        $t1 = strtotime($fecha);
        //echo date('H',$t1);
        
        if($fech==$fecha){
            $die=true;
            echo "Fecha actualmente en uso o solapa con otras películas.";
        }

        if(!$die){
        $sql = ("INSERT INTO sesion (id_sala, id_pelicula,fecha,precio,activo)
		    VALUES ('".$conn->real_escape_string($sala)."','".$conn->real_escape_string($film)."','".$conn->real_escape_string($fecha)."','".$conn->real_escape_string($precio)."','1')");
            if ($conn->query($sql) === TRUE) {
		        echo " Sesión añadida correctamente.";
		    }else{
		        echo "Error: " . $sql . "<br>" . $conn->error;
		    }
        }
		}
		else{
				header("Refresh: 0; URL=adminAddSesion.php.php");
				echo "<script>alert('Los datos introducidos son incorrectos')</script>";
			
			}
    }

    public function existeSesion($id){

        
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $sql= ("SELECT 1
                FROM sesion
                WHERE id='$id'");
        
         $rs = $conn->query($sql);
          if ($rs && $rs->num_rows == 1) {
                
                return true;

          }
          else {
              return false;
          }
    }
	
}

?>