<?php
	include("../lib/session.php");
	
	$miVariable =  $_POST['codigo'];				 
	$miEstado = new Estado( $miVariable, "", "" );	
	$miEstado -> setConexion( $conexion );	
	$filaUsuario2 = $miEstado -> consultarUnEstado( $miVariable );	
							
	$miEstado->setConexion( $conexion );		
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
			$miEstado->eliminarEstado( );
		?>
	</body>
</html>