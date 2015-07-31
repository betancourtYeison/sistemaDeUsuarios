<?php
	include("../lib/session.php");		
		
	$miPerfil2 = new Perfil( $_POST['codigo'], $_POST['descripcion'], $_POST['tipo'] );								
	$miPerfil2->setConexion( $conexion );	
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Insertar Perfil</title>	
		<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://localhost/sistemaDeUsuarios/php/perfiles/perfiles.php"> 
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/bootstrap.min.css" rel = "stylesheet" type = "text/css" />
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />					
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
				<image src='../../img/usuarioNuevo.png' class='img-responsive'>
				<h2>INSERTAR PERFIL</h2>			
				<?php $miPerfil2->insertarPerfil(); ?>
			</div>			
			<div id = "footer">
				<?php
					include('../lib/footer.php');
				?>	
			</div>	
		</div>		
	</body>
</html>
