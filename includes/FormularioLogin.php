<?php

namespace es\ucm\fdi\aw;

class FormularioLogin extends Form {

  const HTML5_EMAIL_REGEXP = '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$';

  public function __construct() {
    $opciones['class']="formA";
    parent::__construct('formLogin',$opciones);
  }

  protected function generaCamposFormulario ($datos) {
    $username = 'user@example.org';
    $password = '12345';
    if ($datos) {
      $username = isset($datos['username']) ? $datos['username'] : $username;
      $password = isset($datos['password']) ? $datos['password'] : $password;
    }

    $camposFormulario=<<<EOF


      <h2> Iniciar sesion con tu cuenta</h2>
      <input type="text" placeholder="&#128272 Usuario" name="username" required value=$username>
      <input type="password" placeholder="&#128273 Contraseña" name ="password"
      required value=$password>
      <input type="submit" value="Ingresar">
      <a id="reg" href="recordar.php">Recordar contraseña</a>

      <a id="create" href="registro.php">Crear cuenta</a>


EOF;
    return $camposFormulario;
  }



  protected function procesaFormulario($datos) {
 
    $result = array();
    $ok = true;
    $username = isset($datos['username']) ? $datos['username'] : null ;
    if ( !$username || ! mb_ereg_match(self::HTML5_EMAIL_REGEXP, $username) ) {
      $result[] = 'El nombre de usuario no es válido';
      $ok = false;
    }

    $password = isset($datos['password']) ? $datos['password'] : null ;
    if ( ! $password ||  mb_strlen($password) < 4 ) {
      $result[] = 'La contraseña no es válida';
      $ok = false;
    }

    if ( $ok ) {
      $user = User::login($username, $password);


      if ($user && $user->getActivo()==0){
        $result[] = 'El usuario no está activo actualmente , consulte con un administrador';
        return $result;
      }
      if ( $user ) {
        // SEGURIDAD: Forzamos que se genere una nueva cookie de sesión por si la han capturado antes de hacer login
        session_regenerate_id(true);
        App::getSingleton()->login($user);
       $result = \es\ucm\fdi\aw\App::getSingleton()->resuelve('/index.php');
      }else {
        $result[] = 'El usuario o la contraseña son incorrectos';
      }
    }

    return $result;
  }
}
  
?>
