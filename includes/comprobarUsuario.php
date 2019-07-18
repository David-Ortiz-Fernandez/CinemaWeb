<?php

	namespace es\ucm\fdi\aw;
	require_once __DIR__.'/config.php';

	$user = User::SearchUser(htmlspecialchars($_GET['email']));

if( !$user ){

	 echo "Disponible";
}
else{

	 echo "Existe";
}
?>
