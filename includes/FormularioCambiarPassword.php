<?php
namespace es\ucm\fdi\aw;



class FormularioCambiarPassword extends Form {
	public function __construct() {
    parent::__construct('formBaneo');
  }

	protected function generaCamposFormulario ($datos) {
	
    $Pass='';
    $NewPass='';
    $NewPassC='';

    $camposFormulario=<<<EOF
  		<h2 class ="form-titulo">Cambiar password</h2>
        <div class="inputs">
            <input type="password"  	name="NewPass" placeholder="Nueva Password" class="in100" required value=$NewPass>
            <input type="password"  	name="NewPassC" placeholder="Confirmar" class="in100" required value=$NewPassC>
            <input type="submit" 	value="Cambiar Password"  class="btn-enviar" required >
        </div>
		
EOF;
    return $camposFormulario;
  }


    protected function procesaFormulario($datos){
            $user = User::searchUser($_SESSION['username']);
			$app = App::getSingleton();
			$conn = $app->conexionBd();
            
            if($datos['NewPass']==$datos['NewPassC']){

             
                $user->changePassword($datos['NewPass']);
                $id=$_SESSION['username'];
                $pw=password_hash(htmlspecialchars($datos['NewPass']),PASSWORD_DEFAULT);
                $sql = ("UPDATE usuarios
                        SET password='$pw' 
                        WHERE username='$id'");
                
                
                if ($conn->query($sql) === TRUE) {
		        echo " Password cambiada correctamente.";
                }else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
			return false;
    }
}
	
?>
