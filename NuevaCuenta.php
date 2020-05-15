<?php
	session_start();

	if (!empty($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Cuenta en TW</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptRegistro.js"></script>
	<?php
		include('conexion.php');
		$link = conectar();
	?>
</head>
<body>
		<form action="verificadorNuevaCuenta.php" method="post" enctype="multipart/form-data" onsubmit="return validar();">
			<h2 class="tituloSecundarioRegistro">Bienvenido a The Wall</h2>
			<h3 class="tituloSecundarioRegistro">A continuacion ingrese sus datos:</h3>
			<div class="registro">
				<label class="labelWhite">E-mail: </label><br>
				<input type="E-mail" class="redondeado" id="unEmail" name="unEmail"><br>
				<label class="labelWhite">Nombre: </label><br>
				<input type="text" class="redondeado" id="unNombre" name="unNombre"><br>
				<label class="labelWhite">Apellido: </label><br>
				<input type="text" class="redondeado" id="unApellido" name="unApellido"><br>
				<label class="labelWhite">Foto: </label><br>
				<input type="file" class= "boton" id="unImagen" name="unImagen"><br>
				<label class="labelWhite">Nombre de Usuario: </label><br>
				<input type="text" class="redondeado" id="unUsuario" name="unUsuario"><br>
				<label class="labelWhite">Ingrese una clave: </label><br>
				<input type="password" class="redondeado" id="unContraseña" name="unContraseña"><br>
				<label class="labelWhite">Vuelva a ingresar la clave: </label><br>
				<input type="password" class="redondeado" id="unContraseña2" name="unContraseña2"><br>
				<input type="submit" class="boton" value="Ingresar"><br>
		    </div>
		</form>
		<div class="margenI"></div>
		<div class="margenD"></div>
</body>
</html>