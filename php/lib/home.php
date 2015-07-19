<?php	
	include("../lib/session.php");		
?>
<html>
	<head>	
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Sistema de usuarios</title>		
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/bootstrap.min.css" rel = "stylesheet" type = "text/css" />
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />			
		<script src="../../js/jquery-1.11.3.min.js"></script>		
		<script src="../../js/bootstrap.min.js"></script>		
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
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='content'>		
				<br><br>
				<div align="center" class="jumbotron col-lg-offset-3 col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<img src='../../img/sistemas.png' class='img-responsive'>
					<h2>BIENVENID@ A EL SISTEMA</h2>
					<h3><?php echo" ".$miUsuario->getNombre()." ".$miUsuario->getApellido(); ?></h3>			
				</div>				
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="footer">
				<?php
					include('../lib/footer.php');
				?>	
			</div>	
		</div>
	</body>

</html>
