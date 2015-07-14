<?php
	include("../lib/session.php");		
		
	$miModulo2 = new Modulo( $_POST['codigo'], $_POST['descripcion'], $_POST['ruta'],  $_POST['tipo'] );								
	$miModulo2->setConexion( $conexion );	
?>

<html>
	<head>
		<title> INSERTAR MODULO</title>		
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');
						
			$miModulo2->insertarModulo();
			
		?>
	</body>
</html>
