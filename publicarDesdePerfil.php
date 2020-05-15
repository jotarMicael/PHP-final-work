<?php
	session_start();
	include("conexion.php");
	$link = conectar();

		if($_POST['unImagen']){
			$fotocontenido=addslashes(file_get_contents($_FILES['unImagen']['tmp_name']));
			$tipofoto=explode('/', $_FILES['unImagen']['type']);
		}
		else {
			$fotocontenido = NULL;
			$tipofoto = NULL;
		}
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$fecha= date('Y-m-d H:i:s');

		$result = mysqli_query($link, "INSERT INTO mensaje(texto, imagen_contenido, imagen_tipo, usuarios_id, fechayhora) VALUES ('" . $_POST['publish'] . "', '" . $fotocontenido . "', '" . $tipofoto[1] . "' , '" . $_SESSION['usuario']['id'] . "', '$fecha')");
		header("Location: Perfil.php");
		exit;
?>