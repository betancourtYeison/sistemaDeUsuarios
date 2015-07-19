<?php
	include("../lib/session.php");
?>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Modificar</title>	
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
			<h2>MODIFICAR MODULO</h2>
		</div>	
		<div align="center">
			
			<form class="form-inline" action = '#' method = 'post'>
				<input type="text" class="input-large" placeholder="Código del modulo" name = 'codigoConsulta'>					
				<button type="submit" class="btn btn-primary">Buscar</button>
			</form>					
		</div>	
		
		<?php
			if( isset( $_POST['codigoConsulta'] ) )
			{
				$miVariable =  $_POST['codigoConsulta'];				 
				$miModulo = new Modulo( $miVariable, "", "", "" );	
				$miModulo -> setConexion( $conexion );	
				$arregloModulo = $miModulo -> consultarUnModulo( $miVariable );
				
				if( $arregloModulo )
				foreach( $arregloModulo as $moduloConsulta )
				{
					$miModulo -> setCodigo( $moduloConsulta[0] );					
					$miModulo -> setDescripcion( $moduloConsulta[1] );	
					$miModulo -> setRuta( $moduloConsulta[2] );
					$miModulo -> setTipo( $moduloConsulta[3] );																
				}				
							
				$codigo = $miModulo -> getCodigo();					
				$descripcion = $miModulo -> getDescripcion();
				$ruta = $miModulo -> getRuta();
				$tipo = $miModulo -> getTipo();
			}					
			else
			{
				$codigo = '';
				$descripcion = '';									
				$ruta = '';									
				$tipo = '';									
			}
		?>
		
		<div align = 'center'>	
			<form action = "modificar.php" method = "post">
			
				<table cellpadding = "1px">
					<tr>
					<td><input type="hidden"  name = "codigo" value = '<?php echo $codigo; ?>' /></td>
					</tr>
						<td>DESCRIPCION :</td> <td><input type = "text" name = "descripcion" value = '<?php echo $descripcion; ?>' /></td>
					</tr>
						<td>RUTA :</td> <td><input type = "text" name = "ruta" value = '<?php echo $ruta; ?>' /></td>
					</tr>
					<td>TIPO :</td> <td><input type = "text" name = "tipo" value = '<?php echo $tipo; ?>' /></td>
					</tr>
				</table>
				<br></br>			 
				<button type="submit" class="btn btn-primary">MODIFICAR MODULO</button>
			</form>				
		</div>			
	</body>
	
</html>