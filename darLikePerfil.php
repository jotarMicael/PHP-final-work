<?php
	session_start();
	include('conexion.php');
	$idPublicacion = $_GET['id'];
	$link = conectar();
	 mysqli_query($link, " INSERT INTO me_gusta (usuarios_id, mensaje_id) VALUES ('". $_SESSION['usuario']['id']."',  '" . $idPublicacion . "') ");
	 header('Location: Perfil.php');
?>