<?php 
session_start();
include('verificarSeguido.php');
include('verificarAmigos.php');

if (empty($_SESSION['usuario'])) {
	header('Location: index.php');
	exit;}
if (!empty($_SESSION['error'])){
	echo $_SESSION['error'];
	unset($_SESSION['error']);}
 ?>
<!DOCTYPE html>
<html>
<title>Amigos</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link href="all.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptInicio.js"></script>
<head>
	<div class="barraInicio" >
      <div class="divBotones">
          <a class="botonInicio" href="PagInicio.php"> Inicio </a>
	    </div>
	    <div class="divBotones">
          <a class="botonInicio" href="Perfil.php"> Perfil </a>
	    </div>
	    <div class="divBotones">
        <form action="Busqueda.php" method="post">
          <input class="text" type="search" name="busca" autofocus required size="18" maxlength="15" autocomplete="on" >
          <input type="submit" class="botonInicio"> Buscar </a>
        </form>
        </div>
	    <div class="divBotones">
            <a class="botonInicio" href="Configuracion.php"> Configuracion </a>
	    </div>  
	</div>
	<div class= "fondoBusqueda">
		<?php $idBuscar=$_GET['id']; $result = verificarAmigos($idBuscar);?>
		<?php
	     if(mysqli_num_rows($result) == 0)
	     	echo "No tiene amigos";
	     else {
		 while($fila=mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
		 	<div class="comentario">
	  		<div class="imagenBusqueda">
	  			<img src="foto.php?id=<?php echo $fila['usuarioseguido_id']; ?>" alt="">
	    	</div>	    
	    	<div class="cuerpoComentario">
	    		<div class="barraTop">	
	    			<h5 class="textoBarraTop"><?php echo $fila['nombreusuario'] . " " . $fila['nombre'] . " " . $fila['apellido']?></h5>	
	    		</div>
	    	<div class="barraBot">
	    			<a class="botonInicio" name="Visitar" href="visitarDestino.php?id=<?php echo  $fila['id']; ?>"> Visitar </a> 
	    			<?php  $idEnvio = $fila['id']; if (verificarSeguido($idEnvio)){ ?>
	    				<a class="botonInicio" name="dejarSeguir" href="dejarUsuarioVisita.php?id=<?php echo $idEnvio ; ?>"> Dejar de Seguir</a>
	    			<?php } else {?>
	    				<a class="botonInicio" href="seguirUsuarioVisita.php?id=<?php echo $idEnvio; ?>" name="Seguir"> Seguir </a>
	    			<?php } ?>
	    	</div>
	    	</div>   
	  	   </div>
		<?php }} ?>
	</div>
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6</p>
    </div>
</head>
<body>