<?php 

	include("../lib/session.php"); 
	
	
	$contenedor = new Contenedor($conexion);

	$resultado = $contenedor->consultaContenedor('cabecera');

	
	while($fila = mysql_fetch_array($resultado))
	{
		if($_POST['co1'] != '')
			$colCabe = $_POST['co1'];
		else
			$colCabe = $fila['color_letra'];

		if($_POST['tamCabecera'] != '')
			$tamCabe = $_POST['tamCabecera'];
		else
			$tamCabe = $fila['tamano_letra'];

		if($_POST['tipoCabecera'] != '')
			$tipoCabe = $_POST['tipoCabecera'];
		else
			$tipoCabe = $fila['tipo_letra'];

		if($_POST['fo1'] != '')
			$colFondo = $_POST['fo1'];
		else
			$colFondo = $fila['color_fondo'];

	}
	

	
	$resultado = $contenedor->consultaContenedor('titulo');
	while($fila = mysql_fetch_array($resultado))
	{
		if($_POST['co5'] != '')
			$colTitu = $_POST['co5'];
		else
			$colTitu = $fila['color_letra'];

		if($_POST['tamTitCuerpo'] != '')
			$tamTitu = $_POST['tamTitCuerpo'];
		else
			$tamTitu = $fila['tamano_letra'];

		if($_POST['tipoTitCuerpo'] != '')
			$tipoTitu = $_POST['tipoTitCuerpo'];
		else
			$tipoTitu = $fila['tipo_letra'];

		if($_POST['fo5'] != '')
			$fondoTit = $_POST['fo5'];
		else
			$fondoTit = $fila['color_fondo'];
		
	}


	$resultado = $contenedor->consultaContenedor('menu');
	while($fila = mysql_fetch_array($resultado))
	{
		if($_POST['co2'] != '')
			$colMenu = $_POST['co2'];
		else
			$colMenu = $fila['color_letra'];

		if($_POST['tamMenu'] != '')
			$tamMenu = $_POST['tamMenu'];
		else
			$tamMenu = $fila['tamano_letra'];

		if($_POST['tipoMenu'] != '')
			$tipoMenu = $_POST['tipoMenu'];
		else
			$tipoMenu = $fila['tipo_letra'];

		if($_POST['fo2'] != '')
			$fondoMen = $_POST['fo2'];
		else
			$fondoMen = $fila['color_fondo'];
	}


	$resultado = $contenedor->consultaContenedor('cuerpo');
	while($fila = mysql_fetch_array($resultado))
	{
		if($_POST['co3'] != '')
			$colCuer = $_POST['co3'];
		else
			$colCuer = $fila['color_letra'];

		if($_POST['tamCuerpo'] != '')
			$tamCuer = $_POST['tamCuerpo'];
		else
			$tamCuer = $fila['tamano_letra'];

		if($_POST['tipoCuerpo'] != '')
			$tipoCuer = $_POST['tipoCuerpo'];
		else
			$tipoCuer = $fila['tipo_letra'];

		if($_POST['fo3'] != '')
			$fondoCuer = $_POST['fo3'];
		else
			$fondoCuer = $fila['color_fondo'];
	}


	$resultado = $contenedor->consultaContenedor('pie');
	while($fila = mysql_fetch_array($resultado))
	{
		if($_POST['co4'] != '')
			$colPie = $_POST['co4'];
		else
			$colPie = $fila['color_letra'];

		if($_POST['tamPie'] != '')
			$tamPie = $_POST['tamPie'];
		else
			$tamPie = $fila['tamano_letra'];

		if($_POST['tipoPie'] != '')
			$tipoPie = $_POST['tipoPie'];
		else
			$tipoPie = $fila['tipo_letra'];

		if($_POST['fo4'] != '')
			$fondoPie = $_POST['fo4'];
		else
			$fondoPie = $fila['color_fondo'];
	}


	$css ="
	
	#cabecera h1
	{
		text-align:center;
		font-size: ".$tamCabe."px;
		color: ".$colCabe.";
		font-family: ".$tipoCabe.";
	}
	.container-fluid
	{
		background-color: ".$colFondo.";
	}

	#cabecera
	{
		position: fixed;
		top: 0;	
		width: 100%;	
	}
	#menu
	{
		position: fixed;
		top: 80px;	
		width: 100%;
		font-size: ".$tamMenu."px;		
		font-family: ".$tipoMenu.";	
	}
	.navbar .nav > li > a {
	  
	  color: ".$colMenu.";
	  
	}
	.navbar-inner {
		background-color: ".$fondoMen.";
	}
	#content
	{	
		margin-top: 100px;
		margin-bottom: 140px;
		background-color: ".$fondoCuer.";
		color: ".$colCuer.";
		font-family: ".$tipoCuer.";
		font-size: ".$tamCuer."px;
	}

	.page-header
	{
		background-color: ".$fondoTit.";
	}

	.page-header h2
	{
		color:".$colTitu.";
		font-size: ".$tamTitu."px;
		font-family: ".$tipoTitu.";
		line-height: 40px;
	}

	#contentLogin
	{	
		margin-top: 240px;
		margin-bottom: 60px;
	}

	#footer2
	{
		margin-top:80px;
		height: 100px;
		width: 100%;
		background-color:".$fondoPie.";
		color:".$colPie.";
		font-size:".$tamPie."px;
		font-family: ".$tipoPie.";
	}


	#content .modificar
	{
		margin: 5px;
	}

	.modificar
	{
		margin:0 auto;
		width: 15%;
		height: 30%;	
		border: 1px solid #d7d7d7;
		border-radius: 30px 30px;
		text-align: center;
		display: inline;
	}

	#content .mibutton
	{
		margin: 0 auto;
		display: block;
	}

	.modificar legend
	{
		color: #555555;	
		width: 0px;
		background: rgba(255, 255, 255, 0) transparent;
		border:none;
	}

	.modificar input, select
	{
		width: 150px;
		border-radius: 10px 10px;
	}
	";


	$archivo = fopen("../../css/estilo.css", "w+");
	fwrite($archivo, $css);
	fclose($archivo);

	$contenedor->actualizaContenedor('cabecera', $colCabe, $tamCabe, $tipoCabe, $colFondo);
	$contenedor->actualizaContenedor('menu', $colMenu, $tamMenu, $tipoMenu, $fondoMen);
	$contenedor->actualizaContenedor('titulo', $colTitu, $tamTitu, $tipoTitu, $fondoTit);
	$contenedor->actualizaContenedor('cuerpo', $colCuer, $tamCuer, $tipoCuer, $fondoCuer);
	$contenedor->actualizaContenedor('pie', $colPie, $tamPie, $tipoPie, $fondoPie);
	
	$conexion->cerrarConexion();
	echo "<html>
			<head>			
			<META HTTP-EQUIV='Refresh' CONTENT='0; URL=modificar.php'>
			</head>			
		</html>";
?>

