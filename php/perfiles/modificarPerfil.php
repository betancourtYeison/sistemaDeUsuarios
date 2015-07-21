<?php
	include("../lib/session.php");
?>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Modificar Perfil</title>
		<link rel = "shortcut icon" type = "image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/bootstrap.min.css" rel = "stylesheet" type = "text/css" />
		<link href = "../../css/estilo.css" rel = "stylesheet" type = "text/css" />			
		<script src="../../js/jquery-1.11.3.min.js"></script>		
		<script src="../../js/bootstrap.min.js"></script>		
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

			<div class="page-header" align = "center">
				<image src='../../img/perfil.png' class='img-responsive'>
				<h2>MÓDULO PERFILES</h2>			
			</div>

			<?php
				if( isset( $_GET['perfil'] ) )
				{
					$miVariable =  $_GET['perfil'];				 
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

			<div align='center' class="col-lg-offset-3 col-md-offset-3">	
				<form class="form-horizontal" role="form" action="modificar.php" method="post">
			  	  	<div class="form-group">
			  	    	<label for="codigo" class="col-sm-2 control-label">Codigo:</label>
			  	    	<div class="col-sm-4">
			  	      		<input type="text" class="form-control" id="codigo" 
			  		      		name="codigo" value='<?php echo $codigo; ?>' placeholder="id" required minlength=1/>
			  		    </div>
			  	  	</div>

		  	  	  	<div class="form-group">
		  	  		    <label for="descripcion" class="col-sm-2 control-label">Descripción:</label>
		  	  		    <div class="col-sm-4">
		  	  		      <input type="text" class="form-control" id="descripcion"
		  	  		      		name="descripcion" value='<?php echo $descripcion; ?>' placeholder="descripción" required minlength=4/>
		  	  		    </div>
		  	  	  	</div>						

				  	<div class="form-group">
					    <div class="col-sm-10">
					    	<button type="submit" class="btn btn-primary">MODIFICAR</button>					    	
					    </div>
				  	</div>
				</form>
			</div>

			<div id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
					include('../lib/footer.php');
				?>	
			</div>		
		</div>			
	</body>
	
</html>