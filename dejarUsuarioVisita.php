<?php
	session_start();
	include('conexion.php');
	$link = conectar();
	$idGet = $_GET['id'];
	mysqli_query($link, " DELETE FROM siguiendo WHERE usuarios_id = '" . $_SESSION ['usuario']['id'] . "' AND usuarioseguido_id = '" .$idGet."'") ;
	header("location: perfilDestino.php?=id<?php echo $idGet; ?>");
	exit;
?>