<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<meta charset="UTF-8">
		<title> - MÓDULO USUARIOS</title>	
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
				<image src='../../img/usuario.png'>
				<h2>MÓDULO USUARIOS</h2>			
			</div>
	
			<div align="center" class="class="col-lg-12 col-md-12 col-sm-12 col-xs-12"">				
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					NUEVO
				</button>				
			</div>		
			<br></br>
			<div class="panel-body">
				<div class="table-responsive">
					<table align = "center" cellpadding = "10px" class = "table table-striped table-hover">				
						<tr align = "center">						
							<th>IDENTIFICACIÓN</th> 					 
							<th>NOMBRE</th> 
							<th>APELLIDO</th> 
							<th>CORREO</th> 
							<th>TÉLEFONO</th> 
							<th>ESTADO</th> 						
							<th>PERFIL</th> 
							<th style="width:20px;"> </th>
        					<th style="width:20px;"> </th>				
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
									<td><a href='modificarUsuario.php?cedula=$usuario[0]' class='btn btn-small btn-primary'>MODIFICAR</a></td>
        							<td><a href='eliminar.php?cedula=$usuario[0]' class='btn btn-small btn-danger'>ELIMINAR</a></td>									
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
			      		<form class="form-horizontal" role="form" action="insert.php" method="post">
			      			<div class="modal-body">
	      				  	  	<div class="form-group">
	      				  	    	<label for="username" class="col-sm-4 control-label">Identificación:</label>
	      				  	    	<div class="col-sm-6">
	      				  	      		<input type="text" class="form-control" id="username" 
	      				  		      		name="cedula" placeholder="id"/>
	      				  		    </div>
	      				  	  	</div>

      				  	  	  	<div class="form-group">
      				  	  		    <label for="firstName" class="col-sm-4 control-label">Nombre:</label>
      				  	  		    <div class="col-sm-6">
      				  	  		      <input type="text" class="form-control" id="firstName"
      				  	  		      		name="nombre" placeholder="nombre"/>
      				  	  		    </div>
      				  	  	  	</div>

							  	<div class="form-group">
								    <label for="lastName" class="col-sm-4 control-label">Apellido:</label>
								    <div class="col-sm-6">
								      <input type="text" class="form-control" id="lastName"
								            name="apellido" placeholder="apellido"/>
								    </div>
							  	</div>

							  	<div class="form-group">
								    <label for="email" class="col-sm-4 control-label">Email:</label>
								    <div class="col-sm-6">
								      <input type="email" class="form-control" id="email"
								            name="correo" placeholder="usuario@mail.com"/>
							    	</div>
							  	</div>

							  	<div class="form-group">
							    	<label for="phone" class="col-sm-4 control-label">Teléfono:</label>
								    <div class="col-sm-6">				    
								      <input type="text" class="form-control" id="phone"
								            name="telefono" placeholder="telefono"/>
								    </div>
							  	</div>

							  	<div class="form-group">
							    	<label for="estado" class="col-sm-4 control-label">Estado:</label>
								    <div class="col-sm-6">				    
								      <select class="form-control" id="estado" name='estado'>
												<?php
													$miEstado = new Estado("","","");
													$miEstado -> setConexion( $conexion );	
													$estados = $miEstado -> consultarEstadoUsuario( );						
													if( $estados )
													foreach( $estados as $estado2 )
													{
														if( $estado == $estado2[0]  )
														{
															echo "<option value='$estado2[0]' selected>$estado2[1]</option>";	
														}
														else
														{										
															echo "<option value='$estado2[0]'>$estado2[1]</option>";	
														}						
													}								
												?>
											</select>
								    </div>
							  	</div>

							  	<div class="form-group">
								    <label for="password" class="col-sm-4 control-label">Contraseña:</label>
								    <div class="col-sm-6">
								      	<input type="password" class="form-control" id="password"
											name="pass" placeholder="****"/>
								    </div>
								</div>

							  	<div class="form-group">
								    <label for="re-password" class="col-sm-4 control-label">Repetir Contraseña:</label>
								    <div class="col-sm-6">					    	
								      	<input type="password" class="form-control" id="re-password"
								            name="pass2" placeholder="****"/>
								    </div>
								</div>

								<div class="form-group">
							    	<label for="perfil" class="col-sm-4 control-label">Estado:</label>
								    <div class="col-sm-6">				    
								      	<select class="form-control" id="perfil" name='perfil'>
											<?php
												$miPerfil = new Perfil("","");
												$miPerfil -> setConexion( $conexion );	
												$perfiles = $miPerfil -> consultarPerfiles( );						
												if( $perfiles )
												foreach( $perfiles as $perfil2 )
												{
													if( $perfil == $perfil2[0] )
													{
														echo "<option value='$perfil2[0]' selected>$perfil2[1]</option>";		
													}
													else
													{
														echo "<option value='$perfil2[0]'>$perfil2[1]</option>";							
													}
												}								
											?>
										</select>
								    </div>
							  	</div>					
				      		</div>
						    <div class="modal-footer">
						    	<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
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
