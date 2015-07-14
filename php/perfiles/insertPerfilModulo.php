<?php
	include("../lib/session.php");		
		
	$miPerfilModulo = new PerfilModulo( "", $_POST['perfil'], $_POST['modulo'] );								
	$miPerfilModulo->setConexion( $conexion );	
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
				
			$cantidadAsignados = $miPerfilModulo->consultarPerfilAsignadoModulo();									
			if( $cantidadAsignados )
			foreach( $cantidadAsignados as $asignados )
			{
				if( $asignados[0] == 0 )
				{
					$miPerfilModulo->insertarPerfilModulo();	
				}
				else
				{
					echo "<br></br><h2 align='center'>EL MODULO YA HA SIDO ASIGNADO A ESE PERFIL</h2>";
				}																			
			}				
		?>
	</body>
</html>
