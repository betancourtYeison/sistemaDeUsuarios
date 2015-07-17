<?php
	include("../lib/session.php");
	
	$miVariable =  $_POST['codigo'];				 
	$miModulo3 = new Modulo( $miVariable, "", "", "" );								
	$miModulo3->setConexion( $conexion );
	$filaUsuario2 = $miModulo3 -> consultarUnModulo( $miVariable );								
			
?>

<html>
	<head>
		<title> ELIMINAR MODULO</title>		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');	
			$miModulo3->eliminarModulo( );
		?>
	</body>
</html>