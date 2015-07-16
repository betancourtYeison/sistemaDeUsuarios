<?php
	include("../lib/session.php");
	
	$miVariable =  $_GET['cedula'];				 
	$miUsuario2 = new Usuario( $miVariable, "", "", "", "", "", "", "", "" );	
	$miUsuario2 -> setConexion( $conexion );	
	$filaUsuario2 = $miUsuario2 -> consultarUnUsuario( $miVariable );	
							
	$miUsuario2->setConexion( $conexion );		
?>

<html>
	<head>
		<title>SIRO - ELIMINAR USUARIO</title>		
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');	
			$miUsuario2->eliminarUsuario( );
		?>
	</body>
</html>