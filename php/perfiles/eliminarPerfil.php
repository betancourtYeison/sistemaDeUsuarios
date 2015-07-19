<?php
	include("../lib/session.php");
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Eliminar Perfil</title>
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/bootstrap.min.css" rel = "stylesheet" type = "text/css" />
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />			
		<script src="../../js/jquery-1.11.3.min.js"></script>		
		<script src="../../js/bootstrap.min.js"></script>
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
			<h2>ELIMINAR PERFIL</h2>
		</div>	
		<div align="center">
			
			<form class="form-inline" action = 'eliminar.php' method = 'post'>
				CODIGO PERFIL :
				<input type="text" class="input-large" placeholder="Identificación" name = 'codigo'>					
				<button type="submit" class="btn btn-primary">ELIMINAR</button>
			</form>					
		</div>			
	</body>	
</html>