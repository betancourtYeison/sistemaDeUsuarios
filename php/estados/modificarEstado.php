<?php
	include("../lib/session.php");
?>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>M�dulo Modificar</title>	
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery-1.11.3.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
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
			<h2>MODIFICAR ESTADO</h2>
		</div>	
		<div align="center">
			
			<form class="form-inline" action = '#' method = 'post'>
				<input type="text" class="input-large" placeholder="C�digo del estado" name = 'codigoConsulta'>					
				<button type="submit" class="btn btn-primary">Buscar</button>
			</form>					
		</div>	
		
		<?php
			if( isset( $_POST['codigoConsulta'] ) )
			{
				$miVariable =  $_POST['codigoConsulta'];				 
				$miEstado = new Estado( $miVariable, "", "" );	
				$miEstado -> setConexion( $conexion );	
				$filaUsuario2 = $miEstado -> consultarUnEstado( $miVariable );	
				$miEstado -> setCodigo( $filaUsuario2['0'] );					
				$miEstado -> setDescripcion( $filaUsuario2['1'] );
				$miEstado -> setTipo( $filaUsuario2['2'] );				
							
				$codigo = $miEstado -> getCodigo();					
				$descripcion = $miEstado -> getDescripcion();
				$tipo = $miEstado -> getTipo();											
			}					
			else
			{
				$codigo = '';
				$descripcion = '';
				$tipo = '';							
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
					<tr>
						<td>TIPO :</td> <td><input type = "text" name = "tipo" value = '<?php echo $tipo; ?>' /></td>
					</tr>									
				</table>
				<br></br>			 
				<button type="submit" class="btn btn-primary">MODIFICAR ESTADO</button>
			</form>				
		</div>			
	</body>
	
</html>