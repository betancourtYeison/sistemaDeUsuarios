<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<meta charset="UTF-8">
		<title> - MODULO USUARIOS</title>	
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />			
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
		<script src="../../js/jquery-1.9.0.min.js"></script>		
		<script src="../../js/bootstrap.js"></script>		
		<script src="../../js/bootstrap-modal.js"></script>
		<script src="../../js/bootstrap-transition.js"></script>
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
				<image src='../../img/usuario.png'>
				<h2>MODULO USUARIOS</h2>			
			</div>
	
			<div class="row">
				<div class="span1"></div>
				<div class="span8">
							<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
							NUEVO
						</button>
						<a href = 'modificarUsuario.php'><button class="btn btn-primary" type="button">
							MODIFICAR
						</button></a>
						<a href = 'eliminarUsuario.php'><button class="btn btn-primary" type="button">
							ELIMINAR
						</button></a>				
				</div>			
			</div>		
			<br></br>
			<div class="row">
				<div class="span1">
				</div>
				<div class="span14">
					<table align = "center" cellpadding = "10px" class = "table table-striped">				
						<tr align = "center">						
							<th>IDENTIFICACION</th> 					 
							<th>NOMBRE</th> 
							<th>APELLIDO</th> 
							<th>CORREO</th> 
							<th>TELEFONO</th> 
							<th>ESTADO</th> 						
							<th>PERFIL</th> 				
						</tr>						
						<?php
							$usuarios = $miUsuario -> consultarUsuarios();
							if( $usuarios )
							foreach( $usuarios as $usuario )
							{
								echo 	
								"<tr>
									<td>$usuario[0]</td>
									<td>$usuario[1]</td>
									<td>$usuario[2]</td>
									<td>$usuario[3]</td>
									<td>$usuario[4]</td>
									<td>$usuario[5]</td>
									<td>$usuario[6]</td>									
								</tr>";
							}	
						?>				
					</table>
				</div>			
				<div class="span1">
				</div>
			</div>	
			
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        		<h4 class="modal-title" id="myModalLabel">CREAR USUARIO</h4>
			      		</div>
			      		<form action = "insert.php" method = "post">
			      			<div class="modal-body">					
								<table cellpadding = "0px">
									<tr>
										<td>Numero de Identificación:</td> <td><input type = "text" name = "cedula" /></td>
									</tr>
										<td>Nombre:</td> <td><input type = "text" name = "nombre" /></td>
									</tr>
									<tr>
										<td>Apellido:</td> <td><input type = "text" name = "apellido" /></td>
									</tr>
									<tr>
										<td>E-m@il:</td> <td><input type = "text" name = "correo" /></td>
									</tr>
									<tr>
										<td>Telefono:</td> <td><input type = "text" name = "telefono" /></td>
									</tr>
									<tr>
										<td>Estado:</td> 
										<td>							
											<select name='estado'>
												<?php
													$miEstado = new Estado("","","");
													$miEstado -> setConexion( $conexion );	
													$estados = $miEstado -> consultarEstadoUsuario( );						
													if( $estados )
													foreach( $estados as $estado )
													{
														echo"<option value='$estado[0]'>$estado[1]</option>";							
													}								
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td>contraseña:</td> <td><input type = "password" name = "pass" /></td>
									</tr>
									<tr>
										<td>Repetir contraseña:</td> <td><input type = "password" name = "pass2" /></td>
									</tr>
									<tr>
										<td>Perfil: </td> 
										<td>
											<select name='perfil'>
												<?php
													$miPerfil = new Perfil("","");
													$miPerfil -> setConexion( $conexion );	
													$perfiles = $miPerfil -> consultarPerfiles( );						
													if( $perfiles )
													foreach( $perfiles as $perfil )
													{
														echo "<option value='$perfil[0]'>$perfil[1]</option>";							
													}								
												?>
											</select>
										</td>
									</tr>
								</table>					
				      		</div>
						    <div class="modal-footer">
						    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">CREAR USUARIO</button>
						     </div>
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
	</div>
	<body>	
</html>
