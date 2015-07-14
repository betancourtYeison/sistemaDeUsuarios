<?php	
	session_name("sesionUsuario");	
	session_start();	
	include("../class/Usuario.php");
	include("../class/Modulo.php");
	include("../class/Perfil.php");
	include("../class/Estado.php");	
	include("../lib/cadenaConexion.php");	
	include("../class/PerfilModulo.php");
	if (!isset($_SESSION["iniciada"])) //si la sesion no ha sido iniciada
	{
		header( "location:../lib/logout.php" );		
	}
	else
	{	
		$miUsuario = unserialize( $_SESSION['miUsuario'] );					
	}	
?>