<?php
	session_start();
     include('conexion.php');
     $link = conectar();
     $idGet = $_GET['id']; 
     mysqli_query($link, " INSERT INTO siguiendo (usuarios_id, usuarioseguido_id) VALUES ('" . $_SESSION ['usuario']['id']."','" .$idGet."') " );
     header("location: PagInicio.php");
     exit;
?>