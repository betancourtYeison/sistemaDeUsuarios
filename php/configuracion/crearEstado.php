
<html>

	<head>
		<title>SIRO - Configuracion | Crear Estado</title>
	</head>
	
	<body>		
		<div align = "center">
			<form action = "insertEstado.php" method = "post">
				<br></br>
				<br></br>
				<h1>CREAR ESTADO</h1>
				<br></br>
				<br></br>
				<table cellpadding = "10px">
					
					<tr>
						<td>Descripcion : </td> <td><input type = "text" name = "descripcion"></td>
					<tr>
						<td>Tipo : </td> 
						<td>
							<select name = "tipo" style = "width:155px">
								<optgroup label = "Seleccione el tipo de estado">
									<option value = "1">Usuario</option>
									<option value = "2">Recurso</option>
								</optgroup>								
							</select>
						</td>
					</tr>
				</table>
				<br></br>
				<br></br>
				<input type = "submit" name = "Crear Estado">
			</form>	
			<br></br>
			<br></br>
			<a href="configuracion.php">Volver al modulo Configuracion</a>
		</div>
		
	</body>
	
</html>