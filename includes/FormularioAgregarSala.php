<?php
namespace es\ucm\fdi\aw;

class FormularioAgregarSala extends Form {

    public function __construct(){

        parent::__construct('formAgregarSala');
    }

    protected function generaCamposFormulario($datos){
        $filas='';
        $columnas='';
        $cine='';
        $camposFormulario=<<<EOF
	    <h2 class ="form-titulo">Agregar Sala</h2>
        <div class="inputs">
            <input type="text"  	name="Cine" placeholder="Cine" class="in100" required value=$cine>
            <input type="text"  	name="Filas" placeholder="Filas" class="in100" required value=$filas>
            <input type="text"  	name="Columnas" placeholder="Columnas" class="in100" required value=$columnas>
            <input type="submit" 	value="Agregar Sala"  class="btn-enviar" required >
        </div>

EOF;
    return $camposFormulario;
    }

    protected function procesaFormulario($datos){


        Sala::addSala($datos['Cine'],$datos['Filas'],$datos['Columnas']);
        return false;
    }




}