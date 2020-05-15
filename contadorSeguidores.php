<?php 
	function contarSeguidores($id){
		$link = conectar();
		$result = mysqli_query($link, "SELECT usuarioseguido_id FROM siguiendo s WHERE '" . $id . "' = s.usuarios_id");
		return mysqli_num_rows($result);
	}

 ?>