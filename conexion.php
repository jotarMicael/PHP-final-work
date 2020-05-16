<?php
	
	function conectar(){
		$link = mysqli_connect('localhost', 'root', '', 'bookflix') or die("Error".mysqli_error($link));
		return $link;
	}
?>