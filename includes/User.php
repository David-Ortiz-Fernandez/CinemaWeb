<?php

namespace es\ucm\fdi\aw;
Class User {
  private $id;
  private $username;
  private $password;
  private $rol;
  private $nombre;
  private $tlf;
  private $activo;
  private $apellidos;
  private $altEmail;
  private $foto;

  private function __construct($id,$username,$password,$nombre,$tlf,$apellidos,$altEmail,$activo,$foto){
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->tlf = $tlf;
    $this->apellidos = $apellidos;
    $this->altEmail = $altEmail;
    $this->rol = [];
    $this->nombre = $nombre;
    $this->activo= $activo;
    $this->foto=$foto;
  }
  public function getFoto(){
    return $this->foto;
  }
  public function getActivo(){
    return $this->activo;
  }
  public function getNombre(){
    return $this->nombre;
  }

  public function getAltEmail(){
    return $this->altEmail;
  }

  public function getApellidos(){
    return $this->apellidos;
  }

  public function getTlf(){
    return $this->tlf;
  }

  public function getId(){
   return $this->id;
 }

  public function rol(){
    return $this->rol;
  }

  public function getUsername(){
    return $this->username;
  }

  public function checkPassword($password){
    return password_verify($password,$this->password);
  }

  public function changePassword($newPassword){
    $this->password = password_hash($newPassword,PASSWORD_DEFAULT);
    
  }

  public static function login($username,$password){
    $user = self::searchUser($username);

    if ($user && $user->checkPassword($password)) {

      $app = App::getSingleton();
      $conn = $app->conexionBd();
      $query = sprintf("SELECT R.nombre FROM rolesusuario RU, roles R WHERE RU.rol = R.id AND RU.usuario=%s", $conn->real_escape_string($user->id));
      $rs = $conn->query($query);
      if ($rs) {
        while($fila = $rs->fetch_assoc()) {
          $user->addRol($fila['nombre']);
        }
        $rs->free();
      }
    
      return $user;
    }
    
    return false;
  }

  public static function searchUser($username){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("SELECT * FROM usuarios WHERE username='%s'", $conn->real_escape_string($username));
    $rs = $conn->query($query);

    if ($rs && $rs->num_rows == 1) {
      $fila = $rs->fetch_assoc();
      $user = new User($fila['id'], $fila['username'], $fila['password'],$fila['nombre'],$fila['tlf'],$fila['apellidos'],$fila['correoAlternativo'],$fila['activo'],$fila['foto']);
      $rs->free();
      return $user;
    }
   
    return false;
  }

  public function addRol($role) {
      $this->rol[] = $role;
    }


}

  
 ?>
