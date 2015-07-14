<?php
	include("../lib/session.php");	
	
	$miModulo3 = new Modulo( $_POST['codigo'], $_POST['descripcion'], $_POST['ruta'], $_POST['tipo'] );								
	$miModulo3->setConexion( $conexion );		
?>

<html>
	<head>
		<title> - MODIFICAR MODULO</title>		
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');							
			$miModulo3->modificarModulo( $_POST['codigo'] );
		?>
	</body>
</html>
