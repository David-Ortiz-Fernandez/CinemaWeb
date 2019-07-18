<?php
namespace es\ucm\fdi\aw;

class FormularioAgregarPeli extends Form {
	public function __construct() {
        $opciones['enctype']="multipart/form-data";
    parent::__construct('formBaneo',$opciones);
  }

	protected function generaCamposFormulario ($datos) {
	$username='';

    $camposFormulario="
    
      <p>Nombre de la pelicula: <input type='text' name='nombre_peli'  placeholder='Nombre de la pelicula' size='68'/></p>
      <p>Foto de la pelicula: <input type='file' name='fileToUpload' id='fileToUpload'></p>
      <p>
        Descripcion:<br>
        <textarea name='descripcion_peli' rows='5' cols='60'></textarea>
      </p>
      <p>
        Sinopsis:<br>
        <textarea name='sinopsis_peli' rows='8' cols='80'></textarea>
      </p>
      <p>URL del trailer: <input type='url' name='url_youtube' placeholder='Ej. https://www.youtube.com/embed/y9hrcbwmYKI' size='76'></p>
      <input type='submit' value='Agregar pelicula'>
   
    ";
    return $camposFormulario;
  }


  protected function procesaFormulario($datos){

    $result = array();
    $dir = getcwd();

    $target_dir = $dir . "/IMG/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image

    echo $_FILES["fileToUpload"]['name'];
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        unlink($target_file);
        $uploadOk = 1;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $app = App::getSingleton();
            $conn = $app->conexionBd();


            $query = "INSERT INTO pelicula (comun, descripcion, nombre, nombreFoto, preestreno, sinopsis, urlyoutube)
                      VALUES(0,'". $datos['descripcion_peli'] ."', '". $datos['nombre_peli'] ."', '". $_FILES["fileToUpload"]["name"] . "', 0, '". $datos['sinopsis_peli'] ."', '". $datos['url_youtube'] ."')" ;

            if ($conn->query($query) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error inserting error " . $conn->error;
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    return $result;

	}
}

?>
