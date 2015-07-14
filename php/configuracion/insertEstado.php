
<html>
	
	<?php
		include("../../conexion.php");

		$query = "INSERT INTO estado ( descripcion, tipo ) VALUES ( '$_POST[descripcion]', '$_POST[tipo]' )";			
			
			if( !mysql_query( $query, $conexion ) )
			{
				die( "Error : " . mysql_error() );
			}
			echo "Perfil Registrado OK<br>";			
			
	?>
	<a href = "crearEstado.php">Volver al Formulario</a>	
	
</html>