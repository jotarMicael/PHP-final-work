<?php
function resultadoBusqueda(){
	include('conexion.php');
	$link = conectar();
	$result = mysqli_query($link, "SELECT * FROM usuarios WHERE id != '" . $_SESSION['usuario']['id'] . "' AND (nombreusuario LIKE '%" . $_POST['busca'] . "%' or nombre LIKE '%" . $_POST['busca'] . "%' or apellido  LIKE '%" . $_POST['busca'] . "%') ");

	return $result;
	exit;
}
?>