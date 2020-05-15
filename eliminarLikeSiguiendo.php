<?php 
	session_start();
	include('conexion.php');
	$idPublicacion = $_GET['id'];
	$link = conectar();
	mysqli_query($link, "DELETE FROM me_gusta WHERE '" . $idPublicacion . "' = me_gusta.mensaje_id AND '" . $_SESSION['usuario']['id'] . "' = me_gusta.usuarios_id ");

	header('Location: perfilDestino.php');

 ?>