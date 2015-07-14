<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<title> - MODULO USUARIOS</title>	
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
				<image src='../../img/usuario.png'>
				<h2>MODULO USUARIOS</h2>			
			</div>
			
			<div class="row">
				<div class="span1"></div>
				<div class="span8">
						<a class="btn" data-toggle="modal" href="#myModal" >NUEVO</a>									
						<button class="btn btn" type="button">
							<a href = 'modificarUsuario.php'>MODIFICAR</a>
						</button>
						<button class="btn btn" type="button">
							<a href = 'eliminarUsuario.php'>ELIMINAR</a>
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
									<td>$ $usuario[7]</td>
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
				<h3>CREAR USUARIO</h3>
			  </div>
			  <div class="modal-body">
				<form action = "insert.php" method = "post">
				
					<table cellpadding = "0px">
						<tr>
							<td>Numero de Identificacion :</td> <td><input type = "text" name = "cedula" /></td>
						</tr>
							<td>Nombre :</td> <td><input type = "text" name = "nombre" /></td>
						</tr>
						<tr>
							<td>Apellido :</td> <td><input type = "text" name = "apellido" /></td>
						</tr>
						<tr>
							<td>E-m@il :</td> <td><input type = "text" name = "correo" /></td>
						</tr>
						<tr>
							<td>Teléfono :</td> <td><input type = "text" name = "telefono" /></td>
						</tr>
						<tr>
							<td>Estado :</td> 
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
							<td>Password :</td> <td><input type = "password" name = "pass" /></td>
						</tr>
						<tr>
							<td>Repetir Password :</td> <td><input type = "password" name = "pass2" /></td>
						</tr>
						<tr>
							<td>Perfil : </td> 
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
					<br></br>			 
					<button type="submit" class="btn btn-primary">CREAR USUARIO</button>
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
