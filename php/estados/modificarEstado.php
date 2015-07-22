<?php
	include("../lib/session.php");
?>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Modificar</title>	
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
				<image src='../../img/estado.png' class='img-responsive'>
				<h2>MODIFICAR ESTADO</h2>
			</div>	
			
				<?php
				if( isset( $_GET['codigoConsulta'] ) )
				{
					$miVariable =  $_GET['codigoConsulta'];
					$miEstado = new Estado( $miVariable, "", "" );	
					$miEstado -> setConexion( $conexion );	
					$arregloModulo = $miEstado -> consultarUnEstado( $miVariable );

					if( $arregloModulo )
					foreach( $arregloModulo as $estadoConsulta )
					{	
						$miEstado -> setCodigo( $estadoConsulta[0] );					
						$miEstado -> setDescripcion( $estadoConsulta[1] );	
						$miEstado -> setTipo( $estadoConsulta[2] );																
					}				
								
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
			
			<div align='center' class="col-lg-offset-3 col-md-offset-3">	
				<form class="form-horizontal" role="form" action="modificar.php" method="post">
					<div class="form-group">
			  	    	<label for="codigo" class="col-sm-2 control-label">Codigo:</label>
			  	    	<div class="col-sm-4">
			  	      		<input type="text" class="form-control" id="codigo" 
			  		      		name="codigo" value='<?php echo $codigo; ?>' readonly="readonly" placeholder="id" required minlength=1/>
			  		    </div>
			  	  	</div>

			  	  	<div class="form-group">
		  	  		    <label for="descripcion" class="col-sm-2 control-label">Descripción:</label>
		  	  		    <div class="col-sm-4">
		  	  		      <input type="text" class="form-control" id="descripcion"
		  	  		      		name="descripcion" value='<?php echo $descripcion; ?>' placeholder="descripción" required/>
		  	  		    </div>
		  	  	  	</div>	


		  	  	  	<div class="form-group">
		  	  		    <label for="type" class="col-sm-2 control-label">Tipo:</label>
		  	  		    <div class="col-sm-4">
		  	  		      <input type="text" class="form-control" id="type"
		  	  		      		name="tipo" value='<?php echo $tipo; ?>' placeholder="tipo" required/>
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