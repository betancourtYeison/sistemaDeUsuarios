<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Usuarios</title>	
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery-1.11.3.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script> 
		function comprobarClave(){ 
		   	pass = document.formNuevo.pass.value 
		   	pass2 = document.formNuevo.pass2.value

		   	var espacios = false;
		   	var cont = 0;
		   	 
		   	while (!espacios && (cont < pass.length)) {
		   	  	if (pass.charAt(cont) == " ")
		   	    	espacios = true;
		   	  	cont++;
		   	}
		   	 
		   	if (espacios) {
		   	  	alert ("La contraseña no puede contener espacios en blanco");
		   	  	return false;
		   	} 

		   	if (pass.length == 0 || pass2.length == 0) {
		   	  	alert("Los campos de la contraseña no pueden quedar vacios");
		   	  	return false;
		   	}

		   	if (pass != pass2) {
		   	  	alert("Las contraseña deben de coincidir");
		   	  	return false;
		   	} else {
		   	 	return true; 
		   	} 
		} 
		</script> 
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
				<image src='../../img/usuario.png' class='img-responsive'>
				<h2>MÓDULO USUARIOS</h2>			
			</div>
	
			<div align="center" class="class="col-lg-12 col-md-12 col-sm-12 col-xs-12"">				
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					NUEVO
				</button>							
			</div>	

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
							$cedula = $miUsuario -> getCedula();
							$perfil = $miUsuario -> getPerfil();
							$miPerfil;

							if($perfil == 1){
								$miPerfil = "ADMINISTRADOR";
							}else{
								$miPerfil = "NORMAL";
							}

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
									";
									if($miPerfil == "ADMINISTRADOR"){
										echo
										"
											<td><a href='modificarUsuario.php?cedula=$usuario[0]'><button type='button' class='btn btn-primary'>MODIFICAR</button></a></td>
										";
									}else{
										if($cedula == $usuario[0] && $miPerfil == $usuario[6]){
											echo
											"
												<td><a href='modificarUsuario.php?cedula=$usuario[0]'><button type='button' class='btn btn-primary'>MODIFICAR</button></a></td>
											";
										}else{
											echo
											"
												<td><a href='modificarUsuario.php?cedula=$usuario[0]'><button type='button' class='hide btn btn-primary'>MODIFICAR</button></a></td>
											";
										}
									}

									if((($miUsuario -> getCedula()) == $usuario[0]) || $miPerfil == "NORMAL"){
										echo
										"
											<td><button type='button' class='hide btn btn-danger' data-toggle='modal' data-target='#modalUsuario$usuario[0]'>ELIMINAR</button></td>
										";
									}else{
										echo
										"
											<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalUsuario$usuario[0]'>ELIMINAR</button></td>
										";										
									}
									echo
									"<div align='center' class='modal fade bs-example-modal-smm' id='modalUsuario$usuario[0]' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel'>
									  	<div class='modal-dialog modal-sm'>
									    	<div class='modal-content'>
									      		<div class='modal-header'>
									              	<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									              	<h4 class='modal-title' id='myModalLabel'>¿Estás seguro?</h4>
									            </div>
									            <div class='modal-body'>
									            	<a href='eliminar.php?cedula=$usuario[0]'><button type='submit' class='btn btn-danger'>SI</button></a>
									            	<button type='button' class='btn btn-default' data-dismiss='modal'>NO</button>				            					              
									            </div>
									    	</div>
										</div>
									</div>	

								</tr>";
							}	
						?>				
					</table>
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
			      		<form class="form-horizontal" role="form" onSubmit="return comprobarClave()" action="insert.php" method="post" name="formNuevo">
			      			<div class="modal-body">
	      				  	  	<div class="form-group">
	      				  	    	<label for="username" class="col-sm-4 control-label">Identificación:</label>
	      				  	    	<div class="col-sm-6">
	      				  	      		<input type="text" class="form-control" id="username" 
	      				  		      		name="cedula" placeholder="id" required minlength=8/>
	      				  		    </div>
	      				  	  	</div>

      				  	  	  	<div class="form-group">
      				  	  		    <label for="firstName" class="col-sm-4 control-label">Nombre:</label>
      				  	  		    <div class="col-sm-6">
      				  	  		      <input type="text" class="form-control" id="firstName"
      				  	  		      		name="nombre" placeholder="nombre" required/>
      				  	  		    </div>
      				  	  	  	</div>

							  	<div class="form-group">
								    <label for="lastName" class="col-sm-4 control-label">Apellido:</label>
								    <div class="col-sm-6">
								      <input type="text" class="form-control" id="lastName"
								            name="apellido" placeholder="apellido" required/>
								    </div>
							  	</div>

							  	<div class="form-group">
								    <label for="email" class="col-sm-4 control-label">Email:</label>
								    <div class="col-sm-6">
								      <input type="email" class="form-control" id="email"
								            name="correo" placeholder="usuario@mail.com" required/>
							    	</div>
							  	</div>

							  	<div class="form-group">
							    	<label for="phone" class="col-sm-4 control-label">Teléfono:</label>
								    <div class="col-sm-6">				    
								      <input type="text" class="form-control" id="phone"
								            name="telefono" placeholder="telefono" required/>
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
											name="pass" placeholder="******" required minlength=6/>
								    </div>
								</div>

							  	<div class="form-group">
								    <label for="re-password" class="col-sm-4 control-label">Repetir Contraseña:</label>
								    <div class="col-sm-6">					    	
								      	<input type="password" class="form-control" id="re-password"
								            name="pass2" placeholder="******" required minlength=6/>
								    </div>
								</div>

								<div class="form-group">
							    	<label for="perfil" class="col-sm-4 control-label">Perfil:</label>
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

			<div id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
					include('../lib/footer.php');
				?>	
			</div>	
		</div>
	</div>
	<body>	
</html>
