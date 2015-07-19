<?php
	session_name("sesionUsuario");	
	session_start();
	include("../../lib/conexion.php");
	include("../../usuarios/Usuario.php");
	include("perfil.php");
	$conexion = new Conexion( "localhost", "perro", "root", "" );
	
	if (!isset($_SESSION["iniciada"])) //si la sesion no ha sido iniciada
	{
		echo "<br>Sesion sin iniciar<br>";			
	}
	else
	{
		echo "<br>Sesion iniciada<br>";		
		$miUsuario = unserialize( $_SESSION['miUsuario'] );
	}
?>
<html>	

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Consultar</title>	
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery-1.11.3.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
	</head>
	
	<body>	
		<?php
			include('../../lib/barraUsuario.php');
		?>
		
		<div align = "center">
			<br></br>
			<br></br>
			<table align = "center" cellpadding = "10px" class = "table table-striped">
				<h1>CONSULTAR PERFIL</h1>
					<tr>
						<th>Codigo</th> <th>Descripcion</th> 
					</tr>
					<br></br>					
			<?php
				$miPerfil = new Perfil( "", "" );	
				$miPerfil -> setConexion( $conexion );	
				$miPerfil -> consultarPerfiles();
			?>
				
			</table>
			
			<br></br>
		<a href="../configuracion.php">Volver al modulo usuarios</a>
		</div>
		
	<body>
	
</html>