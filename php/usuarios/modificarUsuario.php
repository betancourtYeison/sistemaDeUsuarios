<?php
	include("../lib/session.php");
?>
<html>

	<head>
		<title> - MODIFICAR USUARIO</title>
		<link rel = "stylesheet" type="text/css" href="css/estilo.css">
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />
	</head>
	
	<body>	
		<?php
			include('../lib/barraUsuario.php');
		?>
		<br></br>
		<?php
			include('../lib/menu.php');
		?>
		<div class="page-header" align = "center">
			<h2>MODIFICAR USUARIO</h2>
		</div>	
		<div align="center">
			
			<form class="form-inline" action = '#' method = 'post'>
				<input type="text" class="input-large" placeholder="Identificación" name = 'cedulaConsulta'>					
				<button type="submit" class="btn btn-primary">Buscar</button>
			</form>					
		</div>	
		
		<?php
			if( isset( $_POST['cedulaConsulta'] ) )
			{
				$miVariable =  $_POST['cedulaConsulta'];				 
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
				$miUsuario2 -> setDeuda( $filaUsuario2['8'] );	
				
				$cedula = $miUsuario2 -> getCedula();					
				$nombre = $miUsuario2 -> getNombre();
				$apellido = $miUsuario2 -> getApellido();
				$correo = $miUsuario2 -> getCorreo();
				$telefono = $miUsuario2 -> getTelefono();
				$estado = $miUsuario2 -> getEstado();
				$pass = $miUsuario2 -> getPass();
				$perfil = $miUsuario2 -> getPerfil();
				$deuda = $miUsuario2 -> getDeuda();	
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
				$deuda = '';
			}
		?>
		
		<div align = 'center'>	
			<form action = "modificar.php" method = "post">
			
				<table cellpadding = "1px">
					<tr>
						<td>Numero de Identificacion :</td> <td><input type = "text" name = "cedula" value = '<?php echo $cedula; ?>' /></td>
					</tr>
						<td>Nombre :</td> <td><input type = "text" name = "nombre" value = '<?php echo $nombre; ?>' /></td>
					</tr>
					<tr>
						<td>Apellido :</td> <td><input type = "text" name = "apellido" value = '<?php echo $apellido; ?>' /></td>
					</tr>
					<tr>
						<td>E-m@il :</td> <td><input type = "text" name = "correo" value = '<?php echo $correo; ?>' /></td>
					</tr>
					<tr>
						<td>Teléfono :</td> <td><input type = "text" name = "telefono" value = '<?php echo $telefono; ?>' /></td>
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
						</td>
					</tr>
					<tr>
						<td>Password :</td> <td><input type = "password" name = "pass" value = '<?php echo $pass; ?>'/></td>
					</tr>
					<tr>
						<td>Repetir Password :</td> <td><input type = "password" name = "pass2"  value = '<?php echo $pass; ?>'/></td>
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
						</td>
					</tr>
					<tr>
					<!--<td>Deuda : </td> <td><input type = "text" name = "deuda" value = '<?php echo $deuda; ?>' /></td>-->
					</tr>
				</table>
				<br></br>			 
				<button type="submit" class="btn btn-primary">MODIFICAR USUARIO</button>
			</form>				
		</div>			
	</body>
	
</html>