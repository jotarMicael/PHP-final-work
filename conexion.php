<?php
	
	function conectar(){
		$link = mysqli_connect('localhost', 'root', '', 'TheWall') or die("Error".mysqli_error($link));
		return $link;
	}
?>