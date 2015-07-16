<?php
	include("../lib/session.php");	
	
	$miUsuario2 = new Usuario( $_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['telefono'], 
	$_POST['estado'], $_POST['pass'], $_POST['perfil']);
							
	$miUsuario2->setConexion( $conexion );		
		
?>

<html>
	<head>
		<title> MODIFICAR USUARIO</title>		
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');
			if( $_POST['pass'] == "" )
			{	
				echo "EL CAMPO CONTRASEÑA ESTA VACIO";
			}
			else
			{				
				$miUsuario2->modificarUsuario( $_POST['cedula'] );
			}
		?>
	</body>
</html>
