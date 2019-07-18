<?php
namespace es\ucm\fdi\aw;

class FormularioAgregarCine extends Form {

    public function __construct(){

        parent::__construct('formAgregarCine');
    }

    protected function generaCamposFormulario($datos){
        $nombre='';
        $info='';
        $email='';
        $camposFormulario=<<<EOF
	    <h2 class ="form-titulo">Agregar Cine</h2>
           
            <textarea name='descripcion_cine' rows='5' cols='60'></textarea>
            <input type="text"  	name="Cine" placeholder="Nombre" class="in100" required value=$nombre>
            <input type="text"  	name="Email" placeholder="Email" class="in100" required value=$email>
            <input type="submit" 	value="Agregar Cine"  class="btn-enviar" required >
        

EOF;
    return $camposFormulario;
    }

    protected function procesaFormulario($datos){

        
        Cines::addCine($datos['descripcion_cine'],$datos['Cine'],$datos['Email']);

        
    }




}