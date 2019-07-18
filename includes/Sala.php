<?php

    namespace es\ucm\fdi\aw;

    class Sala {

        public function addSala($cine,$filas,$columnas){
            $app = App::getSingleton();
            $conn = $app->conexionBd();
            $numS;

            $sqlnum = ("SELECT max(numSala) as max_sala
                        FROM Sala 
                        WHERE idCine='.$cine.'");

            
            $result = $conn->query($sqlnum);
            $row = $result->fetch_assoc();
            $numS=$row['max_sala'];
            if($numS==0){
                $numS=1;
            }else{
                $numS+=1;
            }
		
			
			if (is_numeric($cine)&&(is_numeric($filas))&&(is_numeric($columnas))){
			$cine = (int)$cine;
			$columnas = (int)$columnas;
			$filas = (int)$filas;

			
            $sql = ("INSERT INTO sala (idCine, filas,columnas,numSala)
		    VALUES ('".$conn->real_escape_string($cine)."','".$conn->real_escape_string($filas)."','".$conn->real_escape_string($columnas)."','".$conn->real_escape_string($numS)."')");
            if ($conn->query($sql) === TRUE) {
		        echo " Sala añadida correctamente.";
		    }else{
		        echo "Error: " . $sql . "<br>" . $conn->error;
		    }
			}
			else{
				header("Refresh: 0; URL=adminAddSala.php");
				echo "<script>alert('Los datos deben de ser enteros')</script>";
			
			}
			 $result->free();
        }



} 
?>