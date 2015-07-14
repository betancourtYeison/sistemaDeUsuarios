<?php
	include("../lib/session.php");		
		
	$miEstado = new Estado( $_POST['codigo'], $_POST['descripcion'], $_POST['tipo'] );								
	$miEstado->setConexion( $conexion );	
?>

<html>
	<head>
		<title>SIRO - INSERTAR ESTADO</title>		
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');
						
			$miEstado->insertarEstado();
			
		?>
	</body>
</html>
