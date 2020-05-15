<?php
	session_start(); 
	include('conexion.php');
	$link = conectar();
	if ( (!empty($_POST['unContraseña'])) and (!empty($_POST['unContraseña2'])) and (!empty($_POST['unContraseña3'])) ){
		$result = mysqli_query($link, "SELECT contrasenia FROM usuarios WHERE id = '" . $_SESSION['usuario']['id'] . "' ");
		$contraseniaAnterior = mysqli_fetch_array($result);
		if ($contraseniaAnterior['contrasenia']==$_POST['unContraseña']){
			if((strlen($_POST['unContraseña2'])>6)||(strlen($_POST['unContraseña2'])<30)){
				if(preg_match('/[a-z]+/',$_POST['unContraseña2'])){
					if(preg_match('/[A-Z]+/',$_POST['unContraseña2'])){
						if(preg_match('/[^a-zA-Z]/', $_POST['unContraseña2'])){
							if($_POST['unContraseña2']==$_POST['unContraseña3']){
								mysqli_query($link, "UPDATE usuarios SET contrasenia = '" . $_POST['unContraseña2'] . "' WHERE id = '" . $_SESSION['usuario']['id']. "' ");
								header("Location: Configuracion.php");
							}
							else{
								$_SESSION['error'] = "Las constraseña nueva y su verificacion deben ser iguales";
     					   		header('Location: NuevaCuenta.php');
                           		exit;
							}
						}
						else{
						    $_SESSION['error'] = "La contraseña debe tener al menos un caracter especial o un numero";
     					    header('Location: NuevaCuenta.php');
                            exit;
                        }
					}
					else{
						$_SESSION['error'] = "La contraseña debe tener al menos una mayuscula";
    			  		header('Location: NuevaCuenta.php');
       			  		exit;
       			  	}
				}
				else {
					$_SESSION['error'] = "La contraseña debe tener al menos una minuscula";
      				header('Location: NuevaCuenta.php');
     				exit;
     			}
			}
			else{
				$_SESSION['error'] = "La contraseña debe tener entre 6 y 30 caracteres";
     			header('Location: NuevaCuenta.php');
      			exit;
      		}
		}
	}
	else{
	 	$_SESSION['error'] = "Debe llenar todos los campos";
	 	header('Location: PagInicio.php');
	 } 
?>