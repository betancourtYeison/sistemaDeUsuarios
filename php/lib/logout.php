<?php
	session_name("sesionUsuario");	
	session_start();
	session_destroy();
	
	header( "location:../../index.php" );
?>
