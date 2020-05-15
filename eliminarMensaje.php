<?php
	session_start();
	include('conexion.php');
	$link = conectar();

	mysqli_query($link, "DELETE FROM me_gusta WHERE '" . $_GET['id'] . "' = mensaje_id ");

	mysqli_query($link, "DELETE FROM mensaje WHERE '" . $_GET['id'] . "' = id ");

	header('Location: Perfil.php');
?>