<?php
     function verificarAmigos($id){
     	include('conexion.php');
         $link = conectar();
	     $result = mysqli_query($link, " SELECT * FROM siguiendo s INNER JOIN usuarios u ON(s.usuarioseguido_id = u.id) WHERE s.usuarios_id = '" . $id . "' ");
	     return $result;
}

?>