
<html>

	<?php
		
		$conexion = mysql_connect( "localhost", "root", "" );
		if( !$conexion )
		{
			die( "Error al conectar : " . mysql_error() );
		}
		
		mysql_select_db( "siro", $conexion );
		$query = "SELECT * FROM perfil";
		
		if( !mysql_query( $query, $conexion ) )
		{
			die( "Error : " . mysql_error() );
		}
		echo "Perfil Registrado OK";
		
	?>

	<a href="crearPerfil.php">Volver al formulario</a>

</html>