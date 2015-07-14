<?php	
	include("../lib/session.php");		
?>

<html>	
	<head>
		<title> - MODULO PERFILES</title>	
		<link href = "../../css/bootstrap.css" rel = "stylesheet" type = "text/css" />	
		<script src="../../js/jquery-1.8.2.js"></script>
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />			
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
				<image src='../../img/configuracion.png'>
				<h2>MODULO DE PERFILES</h2>
			</div>
			<div class="page-header" align = "center">
				<h3>ASIGNAR MODULOS</h3>
			</div>				
			<div align="center">			
				<form class="form-inline" action = 'insertPerfilModulo.php' method = 'post'>					
					<table cellpadding='10px'>
						<tr>
							<td><h3 align='center'>Perfil</h3></td>
							<td><h3 align='center'>Modulo</h3></td>
						</tr>
						<tr>
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
							<td>
								<select name='modulo'>
									<?php	
										$miModulo3 = new Modulo( "", "", "" );
										$miModulo3 -> setConexion( $conexion );	
										$modulos2 = $miModulo3 -> consultarModulos( );						
										if( $modulos2 )
										foreach( $modulos2 as $modulo )
										{
											echo "<option value='$modulo[0]'>$modulo[1]</option>";							
										}								
									?>									
								</select>
							</td>
						</tr>
					<table>	
					<br></br>
					<button type="submit" class="btn btn-primary">ASIGNAR</button>
				</form>					
			</div>
			<div class="span14">
				<table align = "center" cellpadding = "10px" class = "table table-striped">								
				</table>
			</div>
			<div class="row">
				<div class="span1">
				</div>
				<div class="span14">
					<table align = "center" cellpadding = "10px" class = "table table-striped">				
						<tr align = "center">		 					 
							<th>PERFIL</th> 
							<th>MODULO</th> 													
						</tr>						
						<?php
							$miPerfilModulo = new PerfilModulo( "", "", "" );
							$miPerfilModulo->setConexion( $conexion );
							$usuarios = $miPerfilModulo -> consultarTodosPerfilModulo();
							if( $usuarios )
							foreach( $usuarios as $usuario )
							{
								echo 	
								"<tr>
									<td>$usuario[0]</td>
									<td>$usuario[1]</td>																	
								</tr>";
							}
						?>				
					</table>
				</div>			
				<div class="span1">
				</div>
			</div>					
		</div>
		<div id = "footer">
			<?php
				include('../lib/footer.php');
			?>	
		</div>
	</div>			
	</body>
</html>



