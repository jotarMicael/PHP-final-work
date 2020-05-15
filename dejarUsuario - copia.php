<?php
	session_start();
	include('conexion.php');
	$idGet = $_GET['id'];
	$link = conectar();
	mysqli_query($link, " DELETE FROM siguiendo WHERE usuarios_id = '" . $_SESSION ['usuario']['id'] . "' AND usuarioseguido_id = '" .$idGet."'") ;
	header("location: PagInicio.php");
	exit;
?>