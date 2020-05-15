<?php
	session_start();

	include('conexion.php');
	$link = conectar();

	if (empty($_POST['nickname'])) {
		$_SESSION['error'] = 'ingresar usuario';
		header('Location: index.php');
		exit;
	}
	if (empty($_POST['contraseña'])) {
		$_SESSION['error'] = 'ingresar contraseña';
		header('Location: index.php');
		exit;
	}
	
	 $result = mysqli_query($link, "SELECT * FROM usuarios WHERE nombreusuario = '" . $_POST['nickname'] . "' AND contrasenia = '" . $_POST['contraseña'] . "' ");

	if( mysqli_num_rows($result) == 0 ){
		$_SESSION['error'] = 'No existe el usuario ingresado';
		header('Location: index.php');
		exit;
	}
	else{
		$_SESSION['usuario'] = mysqli_fetch_array($result);	
		header('Location: PagInicio.php');
		exit;
	}
?>