<?php
	session_name("sesionUsuario");	
	session_start();
	include("../../lib/conexion.php");
	include("../../usuarios/Usuario.php");
	include("../perfilModulo/perfilModulo.php");
	include("perfil.php");
	$conexion = new Conexion( "localhost", "siro", "root", "" );
	
	if (!isset($_SESSION["iniciada"])) //si la sesion no ha sido iniciada
	{
		echo "<br>Sesion sin iniciar<br>";			
	}
	else
	{
		echo "<br>Sesion iniciada<br>";		
		$miUsuario = unserialize( $_SESSION['miUsuario'] );
	}
	$codigo = $_POST['id'];
	$descripcion = $_POST['descripcion'];
	
	echo "<pre>";
	print_r( $_POST );
	echo "</pre>";
	
	for( $i = 1; $i <= $_POST['num_cajas']; $i++ )
	{
		if( $_POST["caja$i"] )
		{
			echo "<br>Llego la caja $i <br>";
			$miPerfilModulo = new PerfilModulo( "", $codigo, $i );
			$miPerfilModulo -> setConexion( $conexion );
			$miPerfilModulo -> insertarPerfilModulo();
			
		}
		else if (!isset( $_POST["caja$i"] ))
		{
			echo "<br>la caja $i no llego <br>";
		}	
	}		
	
	$miPerfil = new Perfil( $codigo, $descripcion );
	$miPerfil -> setConexion( $conexion );
	$miPerfil -> insertarPerfil();
	
	
?>
<html>
	<head>
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>	
		<?php
			include('../../lib/barraUsuario.php');
		?>
		
		<div align = 'center'>
			<a href="crearPerfil.php">Volver al formulario</a>
		</div>
	</body>

</html>