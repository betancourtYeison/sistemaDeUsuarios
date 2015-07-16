<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<title> - Modulo de productos</title>	
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />	
		<script src="../../js/jquery-1.8.2.js"></script>
		<script src="../../js/bootstrap-modal.js"></script>
		<script src="../../js/bootstrap-transition.js"></script>
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
	</head>	
	
	<body>	

		<div class="container">
			<div class ="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='cabecera'>
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
					<image src='../../img/productos.png'>
					<h2>MÓDULO DE PRODUCTOS</h2>			
				</div>
		</div>		

			  
		<div id = "footer">
			<?php
				include('../lib/footer.php');
			?>	
		</div>	
	</div>
	<body>	
</html>