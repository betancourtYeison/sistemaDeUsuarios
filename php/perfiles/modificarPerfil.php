<?php
	include("../lib/session.php");
?>
<html>

	<head>
		<title>MODIFICAR PERFIL</title>
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
			<h2>MODIFICAR PERFIL</h2>
		</div>	
		<div align="center">
			
			<form class="form-inline" action = '#' method = 'post'>
				<input type="text" class="input-large" placeholder="Código del perfil" name = 'codigoConsulta'>					
				<button type="submit" class="btn btn-primary">Buscar</button>
			</form>					
		</div>	
		
		<?php
			if( isset( $_POST['codigoConsulta'] ) )
			{
				$miVariable =  $_POST['codigoConsulta'];				 
				$miPerfil = new Perfil( $miVariable, "" );	
				$miPerfil -> setConexion( $conexion );	
				$filaUsuario2 = $miPerfil -> consultarUnPerfil( $miVariable );	
				$miPerfil -> setCodigo( $filaUsuario2['0'] );					
				$miPerfil -> setDescripcion( $filaUsuario2['1'] );							
							
				$codigo = $miPerfil -> getCod();					
				$descripcion = $miPerfil -> getDescripcion();													
			}					
			else
			{
				$codigo = '';
				$descripcion = '';										
			}
		?>
		
		<div align = 'center'>	
			<form action = "modificar.php" method = "post">
			
				<table cellpadding = "1px">
					<tr>
						<td>CODIGO :</td> <td><input type = "text" name = "codigo" value = '<?php echo $codigo; ?>' /></td>
					</tr>
						<td>DESCRIPCION :</td> <td><input type = "text" name = "descripcion" value = '<?php echo $descripcion; ?>' /></td>
					</tr>													
				</table>
				<br></br>			 
				<button type="submit" class="btn btn-primary">MODIFICAR PERFIL</button>
			</form>				
		</div>			
	</body>
	
</html>