<?php 
	session_start();
	include('conexion.php');
	$link = conectar();
	$idABuscar = $_GET['id'];

	 $result = mysqli_query($link, "SELECT nombreusuario, id, nombre, apellido FROM usuarios WHERE id = '".$idABuscar."' ");

	 if( mysqli_num_rows($result) == 0 ){
		$_SESSION['error'] = 'No existe el usuario ';
		header('Location: PagInicio.php');
		exit;
	}
	else{
		$_SESSION['visita'] = mysqli_fetch_array($result);	
		header('Location: perfilDestino.php');
		exit;
	}
 ?>