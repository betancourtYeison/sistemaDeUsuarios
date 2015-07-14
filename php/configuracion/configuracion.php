<?php	
	include("../lib/session.php");	
?>
<html>	
	<head>
		<title> - MODULO CONFIGURACION</title>	
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />	
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />	
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />		
		<script src="../../js/jquery-1.8.2.js"></script>		
	</head>	
	<body>
		<div id='cabecera'>
			<?php
				include('../lib/barraUsuario.php');
			?>
		</div>		
		<div id='menu'>
			<?php
				include('../lib/menu.php');
			?>	
		</div>
		<div id='content'>
			<div class="page-header" align = "center">
				<image src='../../img/configuracion.png'>
				<h2>MODULO DE CONFIGURACION</h2>
			</div>			
			<div class="row">
				<div class='span1'>
				</div>
				<div class='span6'>
					<h3>Componentes del sistema</h3>
				</div>
			</div>			
			<div class="row">
				<div class='span3'>
				</div>			
				<div class='span3' align='center'>
					<image src='../../img/estado.png' >
					<h4 align='center'>Estados</h4>
					<p align='justify'>
						Aquí se configuran los estados de los usuarios y otros componentes del sistema.
					</p>
					<p align='center'>
						<a class="btn btn-primary" href="../estados/estados.php">Configurar Estado</a>
					</p>				
				</div>
				<div class='span1'>
				</div>
				
				<div class='span1'>
				</div>
				<div class='span3' align='center'>
					<image src='../../img/tipo.png' >
					<h4 align='center'>Tipos de Recurso</h4>
					<p align='justify'>
						Aquí se configuran los tipos de recursos y otros componentes del sistema.
					</p>
					<p align='center'>
						<a class="btn btn-primary" href="../tipoRecurso/tipoRecurso.php">Configurar Tipos</a>
					</p>				
				</div>				
			</div>
			<div class="row">
				<div class='span3'>
				</div>		
				
			</div>
			
			<br></br>
					
			<div class="row">
				<div class='span1'>
				</div>
				<div class='span6'>
					<h3>Otras Confuguraciones</h3>
				</div>
			</div>
			<div class="row">
				<div class='span3'>
				</div>
				<div class='span3' align='center'>
					<image src='../../img/password.png' >
					<h4 align='center'>Recuperar Contraseña</h4>
					<p align='justify'>
						Opción que permite recuperar la contraseña, de una cuenta de usuario.
					</p>
					<p align='center'>
						<a class="btn btn-primary" href="restablecerContrasena.php">Restablecer Contraseña</a>
					</p>				
				</div>
				<div class='span1'>
				</div>
				<div class='span3' align='center'>
					<image src='../../img/modulo.png' >
					<h4 align='center'>Asignación Módulos</h4>
					<p align='justify'>
						Aquí se configuran los módulos, que estaran disponibles para un perfil de usuario.
					</p>
					<p align='center'>
						<a class="btn btn-primary" href="asignarModulo.php">Asignar Módulo</a>
					</p>				
				</div>
			</div>
		</div>			
		<div id = "footer2">
			<?php
				include('../lib/footer.php');
			?>	
		</div>	
	</body>
</html>