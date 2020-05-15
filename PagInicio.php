<?php 
session_start();
include('conexion.php');
include('verificadorLikes.php');
$link = conectar(); 
?>
<!DOCTYPE html>
<html>
<title>Muro de inicio</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity=" sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link href="all.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptInicio.js"></script>
<head>
	<h3 class="tituloTerciarioConfiguracion">
		<?php
		if (empty($_SESSION['usuario'])) {
			header('Location: index.php');
			exit;}
		if (!empty($_SESSION['error'])){
			echo $_SESSION['error'];
			unset($_SESSION['error']);}
 		?>
 	</h3>
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
          <input type="submit" class="botonInicio" value="Buscar"></a>
        </form>
        </div>
	    <div class="divBotones">
            <a class="botonInicio" href="Configuracion.php"> Configuracion </a>
	    </div>  
	</div>
	<div class="fondoComentarios">
	<form action="publicar.php" method="POST" onsubmit="return validar();" enctype="multipart/form-data">
	<div class="comentario">
	    <div class="cuerpoComentario">
	    	<div class="barraTop-publicacion">	
	    		<h5 class="textoBarraTop"><?php echo $_SESSION['usuario']['nombreusuario']; ?></h5>		
	    	</div>
	    	<div>
	    		<textarea cols="3" rows="5" class="contenido-publicacion" name = "publish" id="publish"></textarea>
	    	</div>
	    	<div class="barraBot">
	    		<input type="submit" class="botonInicio" name="Publicar" value="Publicar">
	    		<div class="contenedorIcono">
	    			<input type="file" name="unImagen" class="iconoClip fas fa-paperclip"></i>
	    		</div>	
	    	</div>
	    </div>
	</div>
	</form>	
	<?php

	 $cantidadResultados = 10;

	 if(empty($_GET['pagina'])){
	 	$pagina = 1;
	 } else {
	 	$pagina = $_GET['pagina'];
	 }

	 $empezarDesde = ($pagina-1) * $cantidadResultados;

	 $consulta = "SELECT m.id, u.id AS idUsuario, m.texto, m.imagen_contenido, m.fechayhora, u.nombreusuario							
												FROM mensaje m
												INNER JOIN usuarios u ON(m.usuarios_id = u.id)
												WHERE m.usuarios_id = '" . $_SESSION['usuario']['id']. "' or m.usuarios_id IN (SELECT s.usuarioseguido_id
                       							FROM siguiendo s WHERE s.usuarios_id = '" . $_SESSION['usuario']['id'] . "')   
												ORDER BY m.fechayhora DESC";
	 $resultM = mysqli_query($link, $consulta);

	 $totalResultados = mysqli_num_rows($resultM);

	 $totalDePaginas = ceil($totalResultados / $cantidadResultados);

	 $resultMensaje = mysqli_query($link, "$consulta LIMIT $empezarDesde, $cantidadResultados") ;

	 while($filaM = mysqli_fetch_array($resultMensaje,  MYSQLI_ASSOC)) {?>
	  <div class="comentario">
	  	<div class="imagenPerfil">
	  		<img src="foto.php?id=<?php echo $filaM['idUsuario']; ?>" >
	    </div>	    
	    <div class="cuerpoComentario">
	    	<div class="barraTop">	
	    		<h5 class="textoBarraTop"><?php echo $filaM['nombreusuario']?></h5>
	    		<div class="contenedorIconoYFecha">
	    			<h5 class="textoBarraTop"><?php echo $filaM['fechayhora']; 
	    			$_SESSION['idOperacion'] = $filaM['id'];?></h5> 
	    			<?php if ($filaM['idUsuario']==$_SESSION['usuario']['id']){?>
	    				<a class="iconoDelete fas fa-trash-alt" href="eliminarMensajeInicio.php?id=<?php echo $filaM['id']?>"> </a>
	    			<?php } ?>
	    		</div>     		
	    	</div>
	    	<div class="contenido">
	    		<?php echo $filaM['texto'];?><br>
	    		<?php if($filaM['imagen_contenido']){?>
	    			<img src="fotoM.php?id=<?php echo $filaM['id']; ?>" class="imagenPublicacion">
	    		<?php } ?>
	    	</div>
	    	<div class="barraBot">
	    		<div>
	    		    <h4 class="textoBarraBot"></h4> 
	    	    </div>
	    		<div class="contenedorIcono">	
	    			<?php 
	    				$meGusta = mysqli_query($link, "SELECT * FROM me_gusta WHERE mensaje_id = '" . $_SESSION['idOperacion'] . "' ");
	    				if($meGusta!=NULL) {
	    					$cantLikes = mysqli_num_rows($meGusta);?>
	    					<p> <?php printf($cantLikes); ?> </p>
	    				<?php } else {?>
	    					<p> <?php echo 0; ?> </p>
	    				<?php } ?>
	    			<?php 
	    			 $diLike = mysqli_query($link, "SELECT id FROM me_gusta WHERE '" . $_SESSION ['usuario']['id'] . "' = me_gusta.usuarios_id AND me_gusta.mensaje_id = '" . $_SESSION['idOperacion'] . "' ");
	    			 $idOperacion = $_SESSION['idOperacion']; 
	    			 if(mysqli_num_rows($diLike) == 1){ ?>    			
	    						<a class="iconoCorazon fas fa-heart" style="color: red;" href="eliminarLike.php?id=<?php echo $idOperacion ?>"></a>
	    			<?php } else {?>
	    						<a class="iconoCorazon fas fa-heart" href="darLike.php?id=<?php echo $idOperacion ?>"></a>
	    			<?php } ?>
	    		</div> 		
	    	</div>
	    </div>   
	  </div>
	<?php } 
		for ($i=1; $i<=$totalDePaginas;$i++)
				echo "<a href='?pagina=".$i."' style='color: white;'>".$i."</a> - ";
	?>
	</div>
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6</p>
    </div>
</head>
<body>