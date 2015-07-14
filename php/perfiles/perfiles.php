<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<title>- MODULO PERFILES</title>	
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />	
		<script src="../../js/jquery-1.8.2.js"></script>
		<script src="../../js/bootstrap-modal.js"></script>
		<script src="../../js/bootstrap-transition.js"></script>
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />	
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
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
				<image src='../../img/perfil.png'>
				<h2>ADMINISTRAR PERFILES</h2>
			</div>
		    <div class="page-header" align = "center">				
				<h3>Aqui se configuran los prefiles que interactuan con el sistema</h3>
			</div>	
			
			<div class="row">
				<div class="span1"></div>
				<div class="span8">
						<a class="btn" data-toggle="modal" href="#myModal" >NUEVO</a>									
						<button class="btn btn" type="button">
							<a href = 'modificarPerfil.php'>MODIFICAR</a>
						</button>
						<button class="btn btn" type="button">
							<a href = 'eliminarPerfil.php'>ELIMINAR</a>
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
						</tr>						
						<?php
							$miPerfil = new Perfil( "", "" );
							$miPerfil->setConexion( $conexion );
							$perfiles = $miPerfil -> consultarPerfiles();
							if( $perfiles )
							foreach( $perfiles as $perfil )
							{
								echo 	
								"<tr>
									<td>$perfil[0]</td>
									<td>$perfil[1]</td>																									
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
				<h3>CREAR PERFIL</h3>
			  </div>
			  <div class="modal-body">
				<form action = "insert.php" method = "post">
				
					<table cellpadding = "0px">
						<tr>
							<td>CODIGO :</td> <td><input type = "text" name = "codigo" /></td>
						</tr>
							<td>DESCRIPCION :</td> <td><input type = "text" name = "descripcion" /></td>
						</tr>																
					</table>
					<br></br>			 
					<button type="submit" class="btn btn-primary">CREAR PERFIL</button>
				</form>	
			  </div>
			  
			  <!--<div class="modal-footer">
				<a href="#" class="btn">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			  </div>-->
			</div>
			
		</div>
		<div id = "footer2">
			<?php
				include('../lib/footer.php');
			?>	
		</div>	
	<body>	
</html>
