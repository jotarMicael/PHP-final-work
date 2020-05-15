<?php 
	
function verificarSeguido($fila){
    $link = conectar();
	
	$result = mysqli_query($link, " SELECT * FROM siguiendo s WHERE s.usuarios_id = '" . $_SESSION ['usuario']['id'] . "' AND s.usuarioseguido_id = '". $fila ."' ");
	if(mysqli_num_rows($result)== 0)
		return false;
    else
    	return true;
}


