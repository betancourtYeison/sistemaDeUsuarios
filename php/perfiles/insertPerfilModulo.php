<?php
	include("../lib/session.php");		
		
	$miPerfilModulo = new PerfilModulo( "", $_POST['perfil'], $_POST['modulo'] );								
	$miPerfilModulo->setConexion( $conexion );	
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Insertar Perfil</title>				
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/bootstrap.min.css" rel = "stylesheet" type = "text/css" />
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />			
		<script src="../../js/jquery-1.11.3.min.js"></script>		
		<script src="../../js/bootstrap.min.js"></script>	
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
