<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>The Wall</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<link href="https://file.myfontastic.com/FwupGsg3U5qovJgADFSKVC/icons.css" rel="stylesheet">
	<script type="text/javascript" src="scriptIndex.js"></script>
	<?php 
		include("conexion.php");
		$link = conectar();

		if (!empty($_SESSION['error'])) {
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
	?>
</head>
<body>
	    <h1 class="tituloPrincipal">The Wall</h1>
		<form action="verificadorLogin.php" method="post" id="formularioIndex" onsubmit="return validar();">
			<h2 class="tituloSecundarioIndex">Iniciar Sesion</h2>
			<div class="login">
				<label class="labelWhite">Cuenta: </label>
				<input type="text" class="redondeado" autocomplete="on" id="nickname" name="nickname">
				<label class="labelWhite">Contraseña: </label>
				<input type="password" class="redondeado" id="contraseña" name="contraseña">
				<input type="submit" class="boton" id="botonIngreso" value="Ingresar">
		    </div>
		</form>
		<div class="margenI"></div>
		<div class="margenD"></div>
		<form action = "NuevaCuenta.php" id="formularioNuevaCuenta">
			<label style="font-size: 30px; font font-family: cursive; ">¿No tienes cuenta? </label>
			<input type="submit" class="boton" value="Registrarse">
	    </form>
</body>
</html>