<?php
	include("../lib/session.php");
?>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Modificar Usuario</title>			
		<link rel="shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<script src="../../js/jquery-1.11.3.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>		
		<script> 
		function comprobarClave(){ 
		   	pass = document.formModificar.pass.value 
		   	pass2 = document.formModificar.pass2.value

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
				<h2>DETALLES DEL USUARIO</h2>			
			</div>
			
			<?php
				if( isset( $_GET['cedula'] ) )
				{
					$miVariable =  $_GET['cedula'];	 
					$miUsuario2 = new Usuario( $miVariable, "", "", "", "", "", "", "", "" );	
					$miUsuario2 -> setConexion( $conexion );	
					$filaUsuario2 = $miUsuario2 -> consultarUnUsuario( $miVariable );	
					$miUsuario2 -> setCedula( $filaUsuario2['0'] );					
					$miUsuario2 -> setNombre( $filaUsuario2['1'] );
					$miUsuario2 -> setApellido( $filaUsuario2['2'] );
					$miUsuario2 -> setCorreo( $filaUsuario2['3'] );
					$miUsuario2 -> setTelefono( $filaUsuario2['4'] );
					$miUsuario2 -> setEstado( $filaUsuario2['5'] );
					$miUsuario2 -> setPass( $filaUsuario2['6'] );
					$miUsuario2 -> setPerfil( $filaUsuario2['7'] );
					
					$cedula = $miUsuario2 -> getCedula();					
					$nombre = $miUsuario2 -> getNombre();
					$apellido = $miUsuario2 -> getApellido();
					$correo = $miUsuario2 -> getCorreo();
					$telefono = $miUsuario2 -> getTelefono();
					$estado = $miUsuario2 -> getEstado();
					$pass = $miUsuario2 -> getPass();
					$perfil = $miUsuario2 -> getPerfil();				
				}					
				else
				{
					$cedula = '';
					$nombre = '';
					$apellido = '';
					$correo = '';
					$telefono = '';
					$estado = '';
					$pass = '';
					$perfil = '';
				}
			?>

			<div align='center' class="col-lg-offset-3 col-md-offset-3">	
				<form class="form-horizontal" role="form" onSubmit="return comprobarClave()" action="modificar.php" method="post" name="formModificar">
				  	<div class="form-group">
				    	<label for="username" class="col-sm-2 control-label">Identificación:</label>
				    	<div class="col-sm-4">
				      		<input type="text" readonly="readonly" class="form-control" id="username" 
					      		name="cedula" value='<?php echo $cedula; ?>' placeholder="id" required minlength=8/>
					    </div>
				  	</div>

				  	<div class="form-group">
					    <label for="firstName" class="col-sm-2 control-label">Nombre:</label>
					    <div class="col-sm-4">
					      <input type="text" class="form-control" id="firstName"
					      		name="nombre" value='<?php echo $nombre; ?>' placeholder="nombre" required/>
					    </div>
				  	</div>

				  	<div class="form-group">
					    <label for="lastName" class="col-sm-2 control-label">Apellido:</label>
					    <div class="col-sm-4">
					      <input type="text" class="form-control" id="lastName"
					            name="apellido" value='<?php echo $apellido; ?>' placeholder="apellido" required/>
					    </div>
				  	</div>

				  	<div class="form-group">
					    <label for="email" class="col-sm-2 control-label">Email:</label>
					    <div class="col-sm-4">
					      <input type="email" class="form-control" id="email"
					            name="correo" value='<?php echo $correo; ?>' placeholder="usuario@mail.com" required/>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="phone" class="col-sm-2 control-label">Teléfono:</label>
					    <div class="col-sm-4">				    
					      <input type="text" class="form-control" id="phone"
					            name="telefono" value='<?php echo $telefono; ?>' placeholder="telefono" required/>
					    </div>
				  	</div>

				  	<div class="form-group">
				    	<label for="estado" class="col-sm-2 control-label">Estado:</label>
					    <div class="col-sm-4">				    
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
					    <label for="password" class="col-sm-2 control-label">Contraseña:</label>
					    <div class="col-sm-4">
					      	<input type="password" class="form-control" id="password"
								name="pass" value='<?php echo $pass; ?>' placeholder="******" required minlength=6/>
					    </div>
					</div>

				  	<div class="form-group">
					    <label for="re-password" class="col-sm-2 control-label">Repetir Contraseña:</label>
					    <div class="col-sm-4">					    	
					      	<input type="password" class="form-control" id="re-password"
					            name="pass2" value='<?php echo $pass; ?>' placeholder="******" required minlength=6/>
					    </div>
					</div>

					<?php
						$miPerfil = new Perfil("","");
						$miPerfil -> setConexion( $conexion );	
						$perfiles = $miPerfil -> consultarPerfiles( );	
		    			
		    			if($miUsuario -> getPerfil() == "1"){
		    				echo 
							"<div class='form-group'>
			    				<label for='perfil' class='col-sm-2 control-label'>Perfil:</label>
				    			<div class='col-sm-4'>						    	
				      				<select class='form-control' id='perfil' name='perfil'>";	
		    			}else{
		    				echo 
							"<div class='hide form-group'>
			    				<label for='perfil' class='col-sm-2 control-label'>Perfil:</label>
				    			<div class='col-sm-4'>						    	
				      				<select class='form-control' id='perfil' name='perfil'>";	
		    			}

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
						
						echo 	"</select>
					   		</div>
				  		</div>";								

					?>							

				  	<div class="form-group">
					    <div class="col-sm-10">
					    	<button type="submit" class="btn btn-primary">MODIFICAR</button>					    	
					    </div>
				  	</div>
				</form>
			</div>

			<div id = "footer">
				<?php
					include('../lib/footer.php');
				?>	
			</div>	

		</div>
	</body>
	
</html>