<?php
	include("../lib/session.php");		
		
	$miUsuario2 = new Usuario( $_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['telefono'],
	$_POST['estado'], $_POST['pass'], $_POST['perfil'], $_POST['deuda']);
								
	$miUsuario2->setConexion( $conexion );
	
	$p1 = $_POST['pass'];
	$p2 = $_POST['pass2'];	
?>

<html>
	<head>
		<title>INSERTAR USUARIO</title>		
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');		
			echo "<br></br>";		
			include('../lib/menu.php');
			if( $p1 != $p2 )
			{	
				echo "Las contraseñas no coinciden";
			}
			else
			{				
				$miUsuario2->insertarUsuario();
			}
		?>
	</body>
</html>
