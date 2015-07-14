<?php
	include("../lib/session.php");	
	
	$miPerfil = new Perfil( $_POST['codigo'], $_POST['descripcion'] );								
	$miPerfil->setConexion( $conexion );		
?>

<html>
	<head>
		<title> - MODIFICAR PERFIL</title>		
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');							
			$miPerfil->modificarPerfil( $_POST['codigo'] );
		?>
	</body>
</html>
