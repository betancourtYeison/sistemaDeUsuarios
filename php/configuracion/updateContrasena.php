<?php	
	include("../lib/session.php");	
?>
<html>	
	<head>
		<title>SIRO - MODULO CONFIGURACION  :: RESTABLECER CONTRASEÑA</title>	
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />	
		<script src="../../js/jquery-1.8.2.js"></script>		
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />		
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');
		?>
		<br></br>
		<?php
			include('../lib/menu.php');
			$miCedula=$_POST['cedula'];
			$miUsuario->setPass( 'administrador' );
			$miUsuario->modificarUsuario();		
		?>			
		
	</body>
</html>