<?php
	include("../lib/session.php");
?>
<html>
	<head>
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
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
				<input type="text" class="input-large" placeholder="Identificaci�n" name = 'codigo'>					
				<button type="submit" class="btn btn-primary">ELIMINAR</button>
			</form>					
		</div>			
	</body>	
</html>