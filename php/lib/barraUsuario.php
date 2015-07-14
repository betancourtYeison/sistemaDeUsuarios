<?php
	if(isset($_SESSION["iniciada"]))
	{	
		echo 
		"<div class='col-lg-1 col-md-1 col-sm-12 col-xs-12'>
			<img src='../../img/logo.png' class='img-responsive logoLogin'>
		</div>
		<div class='col-lg-8 col-md-8 col-sm-12 col-xs-12'>
				<h1>Sistema de Usuarios</h1>
		</div>
		<div class='barraUsuario input-group col-lg-2 col-md-2 col-sm-12 col-xs-12'>					
   			<div class='input-group-addon'>".$miUsuario -> getNombre()." ".$miUsuario -> getApellido()."</div>
  			<a href = '../lib/logout.php'><button type='submit'class='btn btn-primary'>SALIR</button></a>	  		
    	</div>";
		
	} 
?>
