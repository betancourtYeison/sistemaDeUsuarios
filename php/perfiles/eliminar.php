<?php
	include("../lib/session.php");
	
	$miVariable =  $_POST['codigo'];				 
	$miPerfil = new Perfil( $_POST['codigo'], $_POST['descripcion'] );								
	$miPerfil->setConexion( $conexion );
	$filaUsuario2 = $miPerfil -> consultarUnPerfil( $miVariable );								
			
?>

<html>
	<head>
		<title>SIRO - ELIMINAR RESERVA</title>		
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');	
			$miPerfil->eliminarPerfil( );
		?>
	</body>
</html>