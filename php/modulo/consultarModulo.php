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
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
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