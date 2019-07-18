<?php
    namespace es\ucm\fdi\aw;
    
    class Compra {
    
    
    public function comprar(){
       
        $app = App::getSingleton();
        $conn = $app->conexionBd();

        if(!isset($_SESSION['id']) || !isset($_POST['seat']) || !isset($_POST['sesion']))
        return 0;

        $user = $_SESSION['id'];
        $sitios = $_POST['seat'];
        $funcion = $_POST['sesion'];
        $price=8;
        $dis=0;

        if(isset($_POST['codigo'])){
            $codigo= $_POST['codigo'];
            $num=Promos::searchPromo($codigo);
            if($num!=-1){
                $price=8-( ($num/100)*8);
                $dis=$num;
            }
        }
        
        $sql = "SELECT fecha 
        FROM sesion
        WHERE id='$funcion'";


        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $fecha=$row['fecha'];
		
        foreach ($sitios as $sitio) {
        $fila=$sitio['x'];
        $columna=$sitio['y'];
        

        $sql = ("INSERT INTO compra (id_usuario, id_funcion,fila,columna,fecha,descuento,total)
		    VALUES ('".$user."','".$funcion."','".$fila."','".$columna."','".$fecha."' ,'".$dis."','".$price."')");

         
        $result=$conn->query($sql);
		
        }
        //$result->free();
        
        
    }

    public function viewCompras(){
        $app = App::getSingleton();
        $conn = $app->conexionBd();

        $sql = "SELECT p.nombre AS p_nombre, p.nombreFoto, ci.nombre AS c_nombre, s.numSala, co.fila AS fila , co.columna as columna ,
                    DATE_FORMAT(f.fecha, '%W, %M %e, %Y') AS dia, DATE_FORMAT(f.fecha, '%H:%i hrs.') AS hora
                FROM compra co, sesion f, pelicula p, sala s, cine ci
                WHERE co.id_usuario = " . $_SESSION['id'] . " AND co.id_funcion = f.id AND f.id_pelicula = p.id AND
                    f.id_sala = s.id AND s.id = ci.id
            ";

        $result = $conn->query($sql);
        if ($result != null && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='ticket-contenedor'>";
            echo "<div class='ticket-img-pelicula'>";
                echo "<img src='" . IMG_PATH . $row['nombreFoto'] . "' />";
            echo "</div>";

            echo "<div class='ticket-detalles'>";
                echo "<h2>" . $row['p_nombre'] . "<br/><br/></h2>";
                echo "<p>" . $row['c_nombre'] . "<br/><br/></p>";
                echo "<p>Sala: " . $row['numSala'] ."<br/><br/></p>";
                echo "<p>Fila: " . $row['fila'] ."<br/><br/></p>";
                echo "<p>Asiento: " . $row['columna'] ."<br/><br/></p>";
                echo "<p>Día: " . $row['dia'] . "<br/><br/></p>";
                echo "<p>Hora: " . $row['hora'] . "</p>";
            echo "</div>";
            echo "</div>";

        }

        } else {
        echo "ERROR: 0 results";
        echo $_SESSION['id'];
        }
		$result->free();
    }


}
    
?>
        



  
