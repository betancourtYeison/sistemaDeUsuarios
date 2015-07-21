<?php
	include("../lib/session.php");
	
	$miVariable =  $_GET['modulo'];				 
	$miModulo2 = new Modulo( $miVariable, "", "", "" );								
	$miModulo2->setConexion( $conexion );
	$filaUsuario2 = $miModulo2 -> consultarUnModulo( $miVariable );										
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Eliminar</title>	
		<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://localhost/sistemaDeUsuarios/php/modulo/modulos.php"> 
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
				<image src='../../img/modulo.png' class='img-responsive'>
				<h2>MODIFICAR MÓDULO</h2>			
				<?php $miModulo2->eliminarModulo( ); ?>
			</div>			
			<div id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
					include('../lib/footer.php');
				?>	
			</div>	
		</div>	
	</body>
</html>