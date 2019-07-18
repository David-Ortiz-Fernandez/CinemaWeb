<?php
namespace es\ucm\fdi\aw;

class FormularioRegistro extends Form {
	public function __construct() {
	$opciones['action']="index.php";

    parent::__construct('formRegistro');
  }

	protected function generaCamposFormulario ($datos) {
	$img= IMG_PATH;
    $username='';
    $password='';
	$nombre='';
	$apellidos='';
	$tlf='';
	$dirAlternativa='';
	$nombreFoto='pic.jgp';
    $camposFormulario=<<<EOF
	<h2 class ="form-titulo">Crea tu cuenta ABCine</h2>
      <div class="inputs">
					<input type="text"  	name="nombre" placeholder="Nombre" class="in100" required value=$nombre>
					<input type="text"  	name="apellidos" placeholder="Apellidos" class="in100" required value=$apellidos>
					<input type="email" 	name="email" placeholder="Correo electrónico" class="campoEmail" required value=$username><img class="noimg1" src= ".$IMG_PATH. no.png"/><img class="okimg1" src=".$IMG_PATH. ok.png"/>
					<input type="password"  name="pass" placeholder="Contraseña" class="in50" required value=$password>
					<input type="text" 	 	name="telefono" placeholder="Teléfono" class="in50" required value=$tlf>
  					<input type="email" 	name="emailAlt" placeholder="Dirección de correo alternativa" class="in101" required value=$dirAlternativa>
					<input type="submit" 	value="Registrar"  class="btn-enviar" required >

					<p class ="p-linker"> ¿ Tienes una cuenta ? <a href="login.php"> Ingresa aqui</a></p>

				</div>

EOF;
    return $camposFormulario;
  }



	protected function procesaFormulario($datos){
		$user = User::searchUser(htmlspecialchars($datos['email']));
		if($user) {
			echo "Usuario actualmente registrado ";
			return false;
		}


		$app = App::getSingleton();
		$conn = $app->conexionBd();
		$pw=password_hash(htmlspecialchars($datos['pass']),PASSWORD_DEFAULT);
		$sql = ("INSERT INTO usuarios (username, password,nombre,apellidos,tlf,correoAlternativo)
		VALUES ('".htmlspecialchars($datos['email'])."','".$pw."','".htmlspecialchars($datos['nombre'])."','".htmlspecialchars($datos['apellidos'])."','".htmlspecialchars($datos['telefono'])."','".htmlspecialchars($datos['emailAlt'])."')");


		if ($conn->query($sql) === TRUE) {
			echo "Cuenta creada correctamente";
				} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
				}

		$user = User::searchUser($datos['email']);
		$id=$user->getId();

		$sql = ("INSERT INTO rolesusuario (usuario,rol)
		VALUES('".$id."','1')");

		if ($conn->query($sql) === TRUE) {
		echo " Roles de usuario predefinidos.";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}

		return false;
	}

}
	
?>
