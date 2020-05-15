<?php		
		//include("conexion.php");
		$id=$_GET['id'];
		//$link=conectar(); 	
		$link = mysqli_connect('localhost','root','','thewall') or die("Error".msqli_error($link));
		$result=mysqli_query($link,"SELECT foto_contenido, foto_tipo
				FROM usuarios
				WHERE id = $id ");
		$row=mysqli_fetch_array($result);
		mysqli_close($link);

		header("Content-type:".$row['foto_tipo']);
		echo($row['foto_contenido']);
?>