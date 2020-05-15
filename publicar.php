<?php
	session_start();
	include("conexion.php");
	$link = conectar();

	if(!($_POST['publish'])){
		$_SESSION['error'] = "No se puede publicar un mensaje vacio";
		header('Location: PagInicio.php');
		exit;
	}
	if(strlen($_POST['publish']>140)){
		$_SESSION['error'] = "No se puede publicar un mensaje con mas de 140 caracteres";
		header('Location: PagInicio.php');
		exit;
	}

	$fotocontenido=addslashes(file_get_contents($_FILES['unImagen']['tmp_name']));
	$tipofoto=explode('/', $_FILES['unImagen']['type']);


	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$fecha= date('Y-m-d H:i:s');

	$result = mysqli_query($link, "INSERT INTO mensaje(texto, imagen_contenido, imagen_tipo, usuarios_id, fechayhora) VALUES ('" . $_POST['publish'] . "', '$fotocontenido', '$tipofoto[1]' , '" . $_SESSION['usuario']['id'] . "', '$fecha')");
	header("Location: PagInicio.php");
	exit;
?>
