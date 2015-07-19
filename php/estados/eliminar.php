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
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Eliminar</title>	
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery-1.11.3.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
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