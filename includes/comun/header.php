<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
	<header>
		<div class="logo">			
				 <img src="<?php echo IMG_PATH; ?>/Logo.png"  />				 
		</div>
				
				<input type="checkbox" id="btnm">
				<label for="btnm"><i class="fa fa-align-justify"></i></label>	
				
			<nav>
				<ul>
					<li> <a id ="botton2" href="index.php"><i class="fa fa-home"></i>Inicio</a></li>
					
					<li> <a href="cines-principal.php"><i class="fa fa-map-o"></i>Cines</a>
						<ul>


						<?php
							 $cin= new \es\ucm\fdi\aw\Cines();
							 $cin->listaNombreCines();
						?>
							
						</ul>
					</li>
					
					<li> <a href="promociones-principal.php"><i class="fa fa-users"></i>Promociones</a>
						<ul>
						
						<?php
							$prom = new \es\ucm\fdi\aw\Promos();
							$prom->listaNombresPromos();
						?>
							
						</ul>
					</li>
					<li> <a href="films.php"><i class="fa fa-film"></i>Entradas</a></li>
					
					<li> <a href="contacto.php"><i class="	fa fa-envelope-open-o"></i>Contacto</a></li>
					<li> <a href="user.php"><i class="fa fa-user-o"></i>Usuario</a></li>
					
					<li> <a href=  <?php
		 		if(isset($_SESSION['login']) && $_SESSION['login'] == true  ){
					echo "logout.php";
				}else{
					echo "login.php";
				}
		  ?>>
		  
		  <i class="fa fa-map-marker"></i>
			<?php

		 if(isset($_SESSION['login']) && $_SESSION['login'] == true ){
			echo "Logout";
		}else{
			echo "Login";
		}
		?></a></li>
		
		
		
		<?php
		$app = new \es\ucm\fdi\aw\App();
		
        if(isset($_SESSION['login']) && $_SESSION['login'] == true && $app->tieneRol('admin', '', '')){
            echo <<<END
			<li><a  href="administrador.php"> <i class="fa fa-map-marker"></i>Administración </a></li>
END;
        }
          ?>
		
		
		
			</ul>
				
			</nav>
			
		<?php
		$app = new \es\ucm\fdi\aw\App();		
        if(isset($_SESSION['login']) && $_SESSION['login'] == true ){ 
/**/
			echo "<div class = 'contineravatar'>";
			echo "<div class = 'continernomavatar'>";
/**/
		echo "<h class='nomavatar'>";
		
			echo $_SESSION['username'];
			echo "</h>";
/**/
			echo "</div>";
/**/			
			echo <<<END
			<div class="minavatar">
END;
            if($_SESSION['foto'] != "static.jpg"){
              $ext =".jpg";
              $foto ="";
              $foto = "userFolder/IMG/" . $_SESSION['foto'] . $ext;
            }else{
              $foto = "";
              $foto = IMG_PATH . "static.jpg";
			}
		
			
		echo <<<END
		<img
END;

		echo " src='";		
		echo  $foto ;
		echo "'";
		echo  " alt='img' id='picture' height='50' width='100%'/>";
		}
		?>	
		<?php
		
		echo <<<END
			</div>
			</div>
END;
		 ?>
			
			
    </header>
	
	<body>
	
	
	</body>
</html>	