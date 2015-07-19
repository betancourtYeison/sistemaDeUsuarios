<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Ingresar</title>	
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery-1.11.3.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
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
		<div id='content'>			
			<div class="page-header" align = "center">
				<image src='../../img/perfil.png'>
				<h2>ADMINISTRAR MODULOS</h2>
			</div>
		    <div class="page-header" align = "center">				
				<h3>Aqui se configuran los modulos que interactuan con el sistema</h3>
			</div>	
			
			<div class="row">
				<div class="span1"></div>
				<div class="span8">
						<a class="btn" data-toggle="modal" href="#myModal" >NUEVO</a>									
						<button class="btn btn" type="button">
							<a href = 'modificarModulo.php'>MODIFICAR</a>
						</button>
						<button class="btn btn" type="button">
							<a href = 'eliminarModulo.php'>ELIMINAR</a>
						</button>					
				</div>			
			</div>		
			<br></br>
			<div class="row">
				<div class="span1">
				</div>
				<div class="span14">
					<table align = "center" cellpadding = "10px" class = "table table-striped">				
						<tr align = "center">						
							<th>CODIGO</th> 					 
							<th>DESCRIPCION</th>
							<th>RUTA</th>
							<th>TIPO</th>
						</tr>						
						<?php
							$miModulo = new Modulo( "", "" ,"", "");
							$miModulo->setConexion( $conexion );
							$perfiles = $miModulo -> consultarModulos();
							if( $perfiles )
							foreach( $perfiles as $modulo )
							{
								echo 	
								"<tr>
									<td>$modulo[0]</td>
									<td>$modulo[1]</td>	
									<td>$modulo[2]</td>	
									<td>$modulo[3]</td>	
								</tr>";
							}	
						?>				
					</table>
				</div>			
				<div class="span1">
				</div>
			</div>	
			
			<div class="modal hide" id="myModal">
			  <div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>CREAR MODULO</h3>
			  </div>
			  <div class="modal-body">
				<form action = "insert.php" method = "post">
				
					<table cellpadding = "0px">
						<tr>
							<td>CODIGO :</td> <td><input type = "text" name = "codigo" /></td>
						</tr>
							<td>DESCRIPCION :</td> <td><input type = "text" name = "descripcion" /></td>
						</tr>
						    <td>RUTA :</td> <td><input type = "text" name = "ruta" /></td>
						</tr>	
						</tr>
						    <td>TIPO :</td> <td><input type = "text" name = "tipo" /></td>
						</tr>	
					</table>
					<br></br>			 
					<button type="submit" class="btn btn-primary">CREAR MODULO</button>
				</form>	
			  </div>
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
