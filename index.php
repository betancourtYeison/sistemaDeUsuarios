<?php	
	session_name("sesionUsuario");		
	session_start();
	include("php/class/Usuario.php");	
	include("php/lib/cadenaConexion.php");
	
	//si la sesion ha sido iniciada
	if (isset($_SESSION["iniciada"])) 
	{
		header( "location:php/lib/home.php" );
	}
	
	//si se manda algo por POST
	if ($_POST) 
	{	
		$miUsuario = new Usuario( "", "", "", "", "", "", "", "", "" );
		$miUsuario->setConexion($conexion);
		$usuario = $miUsuario->loginUsuario( $_POST['id'], $_POST['pas'] );
		
		//si existe un usuario con ese id y ese pass
		if($usuario) 
		{	
			//si la sesion no ha sido iniciada
			if (!isset($_SESSION["iniciada"])) 
			{				
				$_SESSION["idFormulario"]  = "$_POST[id]";
				$_SESSION["iniciada"] = "si";
				$filaUsuario = $miUsuario -> consultarUnUsuario( $_SESSION["idFormulario"] );	
				$miUsuario -> setCedula( $filaUsuario['0'] );			
				$miUsuario -> setNombre( $filaUsuario['1'] );
				$miUsuario -> setApellido( $filaUsuario['2'] );
				$miUsuario -> setCorreo( $filaUsuario['3'] );
				$miUsuario -> setTelefono( $filaUsuario['4'] );
				$miUsuario -> setEstado( $filaUsuario['5'] );
				$miUsuario -> setPass( $filaUsuario['6'] );
				$miUsuario -> setPerfil( $filaUsuario['7'] );
				
				$_SESSION['miUsuario'] = serialize( $miUsuario );
				$_SESSION["perfil"] = $miUsuario -> getPerfil();
				header( "location:php/lib/home.php" );
				echo "no";
			}
			else
			{				
				header( "location:php/lib/home.php" );
				$miUsuario = unserialize( $_SESSION['miUsuario'] );				
			}				
		} 
		else 
		{	
		
		}
	}	
?>
<html>
	<head>	
		<meta charset="UTF-8">
		<title>Sistema de usuarios</title>
		<link href = "css/bootstrap.css" rel = "stylesheet" type = "text/css" />		
		<link href = "css/estilo.css" rel = "stylesheet" type = "text/css" />		
		<link rel = "shortcut icon" type = "image/x-icon" href = "img/favicon.ico" />		
	</head>
	<body>	
		<div class="container">	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
					include('php/lib/barraUsuario.php');
				?>
			</div>	
			<div align="center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<img src='img/logo.png' class="img-responsive LogoIndex" >
				<h2>Sistema de usuarios</h2>
			</div>	
			<div align="center" class="jumbotron col-lg-offset-3 col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">					
				<h2>Iniciar sesión</h2>
				<form  method = 'post' action = '#'>
					<label class = "control-label" for = "inputEmail" >Identificación:</label>
					<div class = "controls"> 
						<input type = "text" id = "inputEmail" placeholder = "Ingrese su identificación" name = 'id'>
					</div>
						<label class = "control-label" for = "inputPassword">Contraseña:</label>
						<div class = "controls">
							<input type = "password" id = "inputPassword" placeholder = "Ingrese su contraseña" name = 'pas'>
						</div>
					<div class = "controls">
						<label class = "checkbox">
							<input type = "checkbox"> Recuerdame
						</label>
						<button type="submit" class="btn btn-primary">Ingresar</button>
					</div> 
				</form>
			</div>							
			
			<div id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class='row' align='center'>					
					<h4>Sistema de usuarios</h4>
					<h4>Powered By CreaArteWeb</h4>
				</div>	
			</div>		
		</div>	
	</body>
</html>
