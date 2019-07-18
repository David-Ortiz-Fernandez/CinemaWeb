<?php
namespace es\ucm\fdi\aw;

class FormularioAgregarSesion extends Form {

    public function __construct(){

        parent::__construct('formAgregarSala');
    }

    protected function generaCamposFormulario($datos){
        $Sala='';
        $Pelicula='';
        $Fecha='';
        $Precio='';
        $camposFormulario=<<<EOF
	    <h2 class ="form-titulo">Agregar Sesion</h2>
        <div class="inputs">
            <input type="text"  	name="Sala" placeholder="Sala" class="in100" required value=$Sala>
            <input type="text"  	name="Pelicula" placeholder="Película" class="in100" required value=$Pelicula>
            <input type="text"  	name="Fecha" placeholder="Fecha" class="in100" required value=$Fecha>
            <input type="text"  	name="Precio" placeholder="Precio" class="in100" required value=$Precio>
            <input type="submit" 	value="Agregar Sesion"  class="btn-enviar" required >
        </div>

EOF;
    return $camposFormulario;
    }

    protected function procesaFormulario($datos){


        Sesion::addSesion($datos['Sala'],$datos['Pelicula'],$datos['Fecha'],$datos['Precio']);
        return false;
    }




}