<?php
    namespace es\ucm\fdi\aw;
    require_once __DIR__.'/config.php';
    
    $tipo = $_POST['tipo'];
    $ses = new Sesion();
    $comp = new Compra();
    if($tipo == 1){
        $ses->sala();
    }else if($tipo == 2){
        $ses->hora();
    }else if($tipo == 3){
        $ses->seats();
    }else if($tipo == 4 ){
        $comp->comprar();
    }
  
?>