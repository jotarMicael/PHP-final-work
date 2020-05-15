<?php
	session_start(); 
	include('conexion.php');

	$link = conectar();
	$nombre = $_POST['unNombre'];
	$apellido = $_POST['unApellido'];
	$email = $_POST['unEmail'];

	if( (!empty($nombre)) and (preg_match('/^[a-zA-Z]+$/',$nombre)) ){
		if( (!empty($apellido)) and (preg_match('/^[a-zA-Z]+$/',$apellido)) ){
				if( (!empty($email)) and (preg_match('/\w+@\w+\.+[a-z]/', $email)) ){
						$verificar = mysqli_query ($link,"SELECT email FROM usuarios WHERE (email = '$email') AND (id != '". $_SESSION['usuario']['id']."') " );
						if(mysqli_num_rows($verificar)== 0){

						$consulta = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email' WHERE id = '" . $_SESSION['usuario']['id'] . "' ";

						mysqli_query($link, $consulta);

						if(!empty($_FILES['unImagen']['tmp_name'])){
							$fotocontenido= addslashes(file_get_contents($_FILES['unImagen']['tmp_name']));
							$tipofoto=explode('/', $_FILES['unImagen']['type']);
							mysqli_query($link, "UPDATE usuarios SET foto_contenido = '$fotocontenido', foto_tipo = '$tipofoto[1]' WHERE id = '" . $_SESSION['usuario']['id'] . "' ");
	                    }

	                    $_SESSION['usuario']['nombre'] = $nombre;
	                    $_SESSION['usuario']['apellido'] = $apellido;
	                    $_SESSION['usuario']['email'] = $email;
	                    header("Location: Configuracion.php");
	                }
	                else{
	                	$_SESSION['error']="El email ya existe";
						header('Location: Configuracion.php');
	                }
	                }
	                else {
						$_SESSION['error']="Campo email incorrecto";
						header('Location: Configuracion.php');
					}
		}
		else {
			$_SESSION['error']="Campo apellido incorrecto";
			header('Location: Configuracion.php');
		}
	}
	else{
		$_SESSION['error']="Campo nombre incorrecto";
		header('Location: Configuracion.php');
	}	
?>

