<?php
	session_name("sesionUsuario");	
	session_start();
	include("../lib/conexion.php");
	include("../usuarios/Usuario.php");
	include("../modulo/modulo.php");
	include("../../conexion.php");
	
	$conexion = new Conexion( "localhost", "siro", "root", "" );	
	
	if (!isset($_SESSION["iniciada"])) //si la sesion no ha sido iniciada
	{
		echo "<br>Sesion sin iniciar<br>";			
	}
	else
	{
		echo "<br>Sesion iniciada<br>";		
		$miUsuario = unserialize( $_SESSION['miUsuario'] );
	}
		
	//cargar el ultimo codigo q se inserto
	$result = mysql_query("select codigo from perfil order by codigo DESC limit 1");
	$resultado = mysql_result ($result, 0); 
	$id = $resultado+1; 
	
	//cargar los modulos
	$estados = mysql_query( "select * from modulo ORDER BY codigo" );
?>
<html>
	<head>
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		
		<?php
			include('../lib/barraUsuario.php');
		?>
		<br></br>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">											
					</a>
					<!-- Be sure to leave the brand out there if you want it shown -->
					<a class="brand" href="#">INICIO</a>
					<?php						
						$miModulo = new Modulo( "", "", "" );
						$miModulo -> setConexion( $conexion );							
						$aa = $miModulo -> consultarModulosPerfil( $_SESSION["perfil"] );							
						$miModulo -> cargarModulosPerfil( $aa );				
					?>	
				</div>
			</div>
		</div>
	
		<div align = "center">
			
			<form action = "insertPerfil.php" method = "post">
				<br></br>
				<br></br>
				<h1>CREAR PERFIL</h1>
				<br></br>
				<br></br>
				<table cellpadding = "10px">
				
					<tr>
						<td>Codigo : </td> <td> <input type = "text" name = "id" value = '<?php echo $id; ?>'> </td>					
					</tr>
					
					<tr>
						<td>Descripcion : </td> <td> <input type = "text" name = "descripcion"> </td>
					</tr>			
					
				</table>
				<br></br>
				<table cellspacing="20px">
					<tr>
						Modulos disponibles : 
					</tr>
					<br></br>
					<tr>
						<?php
							$i = 1;
							$cajas = 0;
							$otro = 0;
							while( $fila = mysql_fetch_row( $estados ) )
							{				
								if( $i == 1 )
								{
									echo
									"<tr>	
										<td>
											<label class='checkbox'>
												<input type='checkbox' checked = 'checked' value=".$fila['0']." name = 'caja".$i."'>".$fila['1']."
											</label>
										</td>
									</tr>";
								}
								else
								{
									echo
									"<tr>	
										<td>
											<label class='checkbox'>
												<input type='checkbox' value=".$fila['0']." name = 'caja".$i."'>".$fila['1']."
											</label>
										</td>
									</tr>";
								}
								
								$i = $i+1;
								$cajas++;
							}													
						?>				
					</tr>						
				</table>
				
				<br></br>
				<br></br>
				<input type = "hidden"  name='num_cajas' value = '<?php echo $cajas?>'>				
				<input type = "submit"  value = 'Crear Perfil'>
				
			</form>
			
			<br></br>
			<br></br>
			<a href="../configuracion.php">Volver a CONFIGURACION</a>
			
		</div>
	</body>

</html>