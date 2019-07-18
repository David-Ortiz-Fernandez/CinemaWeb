<?php
namespace es\ucm\fdi\aw;

class App {
  private static $instance;
  private $bdConn;
  private $rootPath;
  private $installPath;

  public static function getSingleton(){
    if(!self::$instance instanceof self){
      self::$instance = new self;
    }
    return self::$instance;
  }

  private function __construct(){

  }

  public function init($bdConn,$rootPath,$installPath){
    $this->bdConn= $bdConn;

    $this->rootPath=$rootPath;
    $lenRootPath = mb_strlen($this->rootPath);
    if($lenRootPath > 0 && $this->rootPath[$lenRootPath-1]!='/'){
      $this->rootPath.='/';
    }

    $this->installPath = $installPath;
    $lenInstallPath = mb_strlen($this->installPath);
    if($lenInstallPath > 0 && $this->installPath[$lenInstallPath-1]!='/'){
      $this->installPath.='/';
    }
    $this->conn = null;
    session_start();
  }

  public function doInclude($path = '') {
    if (strlen($path) > 0 && $path[0] == '/') {
      $path = mb_substr($path, 1);
    }
    include($this->installPath . '/'.$path);
  }

  public function login(User $user) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user->getUsername();
    $_SESSION['roles'] = $user->rol();
    $_SESSION['tlf']= $user->getTlf();
    $_SESSION['nombre']= $user->getNombre();
    $_SESSION['altEmail']= $user->getAltEmail();
    $_SESSION['apellidos']= $user->getApellidos();
    $_SESSION['foto'] = $user->getFoto();
    $_SESSION['id'] = $user->getId();
  }

  public function logout() {
    //Doble seguridad: unset + destroy
    unset($_SESSION["login"]);
    unset($_SESSION["username"]);
    unset($_SESSION["roles"]);
    unset($_SESSION["tlf"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["altEmail"]);
    unset($_SESSION["apellidos"]);
    unset($_SESSION['foto']);
    unset($_SESSION['id']);


    session_destroy();
    session_start();
  }


  public function usuarioLogueado() {
    return isset($_SESSION["login"]) && ($_SESSION["login"]===true);
  }

  public function nombreUsuario() {
    return isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
  }


  public function conexionBd() {
    if (! $this->conn ) {
      $bdHost = $this->bdConn['host'];
      $bdUser = $this->bdConn['user'];
      $bdPass = $this->bdConn['pass'];
      $bd = $this->bdConn['bd'];

      $this->conn = new \mysqli($bdHost, $bdUser, $bdPass, $bd);
      if ( $this->conn->connect_errno ) {
        echo "Error de conexión a la BD: (" . $this->conn->connect_errno . ") " . utf8_encode($this->conn->connect_error);
        exit();
      }
      if ( ! $this->conn->set_charset("utf8mb4")) {
        echo "Error al configurar la codificación de la BD: (" . $this->conn->errno . ") " . utf8_encode($this->conn->error);
        exit();
      }
    }
    return $this->conn;
  }
  
  
  public function desconexionBd() {
   if ($this->conn ) $this->conn->close();
   return $this->conn;
  }
  

  public function resuelve($path = '') {
    if (strlen($path) > 0 && $path[0] == '/') {
      $path = mb_substr($path, 1);
    }
    return $this->rutaRaizApp . $path;
  }

	 public function tieneRol($rol, $cabeceraError=NULL, $mensajeError=NULL) {
    if (!isset($_SESSION['roles']) || ! in_array($rol, $_SESSION['roles'])) {
      if ( !is_null($cabeceraError) && ! is_null($mensajeError) ) {
        $bloqueContenido=<<<EOF
        <h1>$cabeceraError</h1>
        <p>$mensajeError</p>
EOF;
        echo $bloqueContenido;
      }

      return false;
    }

    return true;
  }

  }
 ?>
