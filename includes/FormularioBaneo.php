<?php
namespace es\ucm\fdi\aw;



class FormularioBaneo extends Form {
	public function __construct() {
    parent::__construct('formBaneo');
  }

	protected function generaCamposFormulario ($datos) {
	$username='';

    $camposFormulario=<<<EOF
		
  			<ul class="listado">
  				<li class ="cont">Banear usuario</li>
					<input type="email" name="username" placeholder="Correo electronico" class="in100" value=$username>
					<input class="ban" type="submit" name="ban1" value="Banear"/>

			</ul>
		
EOF;
    return $camposFormulario;
  }


    protected function procesaFormulario($datos){
			$app = App::getSingleton();
			$conn = $app->conexionBd();


			$user = User::searchUser($datos['username']);


			if($user!=false){
				echo  "El usuario si existe.";
				$id=$user->getId();
				echo "$id";

				$sql = ("DELETE from usuarios where id='$id'");
			}
			else {
				echo  "El usuario no existe.";

			}

			if ($conn->query($sql) === TRUE) {
				echo " Usuario Baneado correctamente.";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			return false;
	}
}
	
?>
