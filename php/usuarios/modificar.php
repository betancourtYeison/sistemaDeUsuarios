<?php
	include("../lib/session.php");
	
	$miUsuario2 = new Usuario( $_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['telefono'], 
	$_POST['estado'], $_POST['pass'], $_POST['perfil']);
							
	$miUsuario2->setConexion( $conexion );		
		
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Modificar Usuario</title>	
		<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://localhost/sistemaDeUsuarios/php/usuarios/usuarios.php"> 	
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	</head>	
	<body>		
		<div class="container">		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='cabecera'>
				<?php
					include('../lib/barraUsuario.php');
				?>
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='menu'>
				<?php
					include('../lib/menu.php');
				?>	
			</div>	
			<div class="page-header" align = "center">
				<image src='../../img/usuarioEditar.png' class='img-responsive'>
				<h2>MODIFICAR USUARIO</h2>			
				<?php 
					$miUsuario2->modificarUsuario( $_POST['cedula'] ); 
				?>

			</div>			
			
			<div id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
					include('../lib/footer.php');
				?>	
			</div>		
		</div>	
	</body>
</html>
