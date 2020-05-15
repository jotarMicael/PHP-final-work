<?php 
	session_start();

	include('conexion.php');
	$link = conectar();

	if(empty($_POST['unEmail'])){
		$_SESSION['error'] = "No se ingreso un mail";
		header('Location: NuevaCuenta.php');
		exit;
	}
	if(!preg_match('/\w+@\w+\.+[a-z]/', $_POST['unEmail'])){
      $_SESSION['error'] = "El Email ingresado es erroneo";
      header('Location: NuevaCuenta.php');
      exit;
	}
    if(empty($_POST['unNombre'])){
	   $_SESSION['error'] = "No se ingreso un nombre";
	   header('Location: NuevaCuenta.php');
       exit;
    }
    if(!preg_match('/^[a-zA-Z]+$/',$_POST['unNombre'])){
      $_SESSION['error'] = "El nombre solo debe contener letras";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(empty($_POST['unApellido'])){
       $_SESSION['error'] = "No se ingreso un apellido";
	   header('Location: NuevaCuenta.php');
	   exit;
	}
	if(!preg_match('/^[a-zA-Z]+$/',$_POST['unApellido'])){
      $_SESSION['error'] = "El apellido ingresado solo debe contener letras";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(empty($_FILES['unImagen'])){
		var_dump($_POST['unImagen']);
		$_SESSION['error'] = "No se ingreso un imagen";
		header('Location: NuevaCuenta.php');
		exit;
	}
		if(empty($_POST['unUsuario'])){
		$_SESSION['error'] = "No se ingreso un usuario";
		header('Location: NuevaCuenta.php');
		exit;
	}
	if(empty($_POST['unContraseña'])){
       $_SESSION['error'] = "No se ingreso una contraseña";
	   header('Location: NuevaCuenta.php');
	   exit;
	}
	if((strlen($_POST['unContraseña'])<6)||(strlen($_POST['unContraseña'])>30)){
      $_SESSION['error'] = "La contraseña debe tener entre 6 y 30 caracteres";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(!preg_match('/[a-z]+/',$_POST['unContraseña'])){
      $_SESSION['error'] = "La contraseña debe tener al menos una minuscula";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(!preg_match('/[A-Z]+/',$_POST['unContraseña'])){
      $_SESSION['error'] = "La contraseña debe tener al menos una mayuscula";
      header('Location: NuevaCuenta.php');
      exit;
	}
    if(!preg_match('/[^a-zA-Z]/', $_POST['unContraseña'])){
      $_SESSION['error'] = "La contraseña debe tener al menos un caracter especial o un numero";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(empty($_POST['unContraseña2'])){
       $_SESSION['error'] = "No se ingreso una confirmacion de contraseña";
	   header('Location: NuevaCuenta.php');
	   exit;
	}
    if(!($_POST['unContraseña'])==($_POST['unContraseña2'])){
       $_SESSION['error'] = "La contraseña nueva y la repeticion de la misma no coinciden";
	   header('Location: NuevaCuenta.php');
	   exit;
	}

	$fotocontenido=addslashes(file_get_contents($_FILES['unImagen']['tmp_name']));
	$tipofoto=explode('/', $_FILES['unImagen']['type']);

	$validar=mysqli_num_rows(mysqli_query($link, "SELECT * FROM usuarios WHERE email = '" . $_POST['unEmail'] . "' or nombreusuario = '" . $_POST['unUsuario'] . "' "));

	if(!$validar){
		$result = mysqli_query($link, "INSERT INTO usuarios (apellido, nombre, email, nombreusuario, contrasenia, foto_contenido, foto_tipo) VALUES ('" . $_POST['unApellido'] . "', '" . $_POST['unNombre'] . "', '" . $_POST['unEmail'] . "' , '" . $_POST['unUsuario'] . "', '" . $_POST['unContraseña'] . "', '$fotocontenido',  '$tipofoto' )");

 /*   if(!$result){
    	$_SESSION['error']= "Hubo un error en la creacion de la cuenta";
    	header("Location: NuevaCuenta.php");
    	exit;
    }
   else{*/
    	$_SESSION['usuario'] = mysqli_fetch_array($result);	
    	$_SESSION['usuario']['id'] = mysqli_insert_id($link);
    	header('Location: PagInicio.php');
    	exit;
    //}
    }
    else
    	$_SESSION['error']= "Cuenta ya existente";
    	header("Location: NuevaCuenta.php");
    	exit;
?>