<?php	
	include("../lib/session.php");	
?>
<html>	
	<head>
		<title>SIRO - MODULO CONFIGURACION</title>	
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />	
		<script src="../../js/jquery-1.8.2.js"></script>		
	</head>	
	<body>		
		<?php
			include('../lib/barraUsuario.php');
		?>
		<br></br>
		<?php
			include('../lib/menu.php');
		?>			
		<div class="page-header" align = "center">
			<image src='../../img/configuracion.png'>
			<h2>MODULO DE CONFIGURACION</h2>
		</div>
		<div class="page-header" align = "center">
			<h3>RESTABLECER CONTRASEÑA</h3>
		</div>	
		<div align="center">			
			<form class="form-inline" action = 'updateContrasena.php' method = 'post'>
				Numero de Identificacion :
				<input type="text" class="input-large" placeholder="Identificación" name = 'cedula'>
				<br></br>
				<br></br>
				<button type="submit" class="btn btn-primary">RESTABLECER</button>
			</form>					
		</div>			
	</body>
</html>