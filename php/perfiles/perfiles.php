<?php	
	include("../lib/session.php");
?>
<html>	
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Perfiles</title>	
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
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

			<div align="center" class="class="col-lg-12 col-md-12 col-sm-12 col-xs-12"">				
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					NUEVO
				</button>							
			</div>	

			<div class="panel-body">
				<div class="table-responsive">
					<table align = "center" cellpadding = "10px" class = "table table-striped table-hover">				
						<tr align = "center">						
							<th>CÓDIGO</th> 					 
							<th>DESCRIPCIÓN</th>
							<th>TIPO</th>
							<th style="width:20px;"> </th>
							<th style="width:20px;"> </th>				 																									
						</tr>						
						<?php
							$objetoPerfil = new Perfil( "", "", "" );
							$objetoPerfil->setConexion( $conexion );
							$perfiles = $objetoPerfil -> consultarPerfiles();
							$cedula = $miUsuario -> getCedula();
							$perfil = $miUsuario -> getPerfil();
							$miPerfil;

							if($perfil == 1){
								$miPerfil = "ADMINISTRADOR";
							}else{
								$miPerfil = "NORMAL";
							}

							if( $perfiles )
							foreach( $perfiles as $perfil )
							{
								echo 	
								"<tr>
									<td>$perfil[0]</td>
									<td>$perfil[1]</td>
									<td>$perfil[2]</td>
									<td><a href='modificarPerfil.php?perfil=$perfil[0]'><button type='button' class='btn btn-primary'>MODIFICAR</button></a></td>
									<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalPerfil$perfil[0]'>ELIMINAR</button></td>
								</tr>";
								
								echo
								"<div align='center' class='modal fade bs-example-modal-smm' id='modalPerfil$perfil[0]' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel'>
								  	<div class='modal-dialog modal-sm'>
								    	<div class='modal-content'>
								      		<div class='modal-header'>
								              	<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								              	<h4 class='modal-title' id='myModalLabel'>¿Estás seguro?</h4>
								            </div>
								            <div class='modal-body'>
								            	<a href='eliminar.php?perfil=$perfil[0]'><button type='submit' class='btn btn-danger'>SI</button></a>
								            	<button type='button' class='btn btn-default' data-dismiss='modal'>NO</button>				            					              
								            </div>
								    	</div>
									</div>
								</div>";											
							}	
						?>						
					</table>
				</div>			
			</div>	
			
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        		<h4 class="modal-title" id="myModalLabel">CREAR PERFIL</h4>
			      		</div>
			      		<form class="form-horizontal" role="form" action="insert.php" method="post" >
			      			<div class="modal-body">
	      				  	  	<div class="form-group">
	      				  	    	<label for="codigo" class="col-sm-4 control-label">Codigo:</label>
	      				  	    	<div class="col-sm-6">
	      				  	      		<input type="text" class="form-control" id="codigo" 
	      				  		      		name="codigo" placeholder="id" required minlength=1/>
	      				  		    </div>
	      				  	  	</div>

      				  	  	  	<div class="form-group">
      				  	  		    <label for="descripcion" class="col-sm-4 control-label">Descripción :</label>
      				  	  		    <div class="col-sm-6">
      				  	  		      <input type="text" class="form-control" id="descripcion"
      				  	  		      		name="descripcion" placeholder="descripción" required minlength=4/>
      				  	  		    </div>
      				  	  	  	</div>	

      				  	  	  	<div class="form-group">
      				  	  		    <label for="tipo" class="col-sm-4 control-label">Tipo :</label>
      				  	  		    <div class="col-sm-6">
      				  	  		      <input type="text" class="form-control" id="tipo"
      				  	  		      		name="tipo" placeholder="tipo" required />
      				  	  		    </div>
      				  	  	  	</div>	      				  	  	  
				      		</div>
						    <div class="modal-footer">
						    	<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
						        <button type="submit" class="btn btn-primary">CREAR PERFIL</button>
						     </div>
			      		</form>	
			    	</div>
			  	</div>
			</div>		

			<div id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
					include('../lib/footer.php');
				?>	
			</div>	
		</div>			
	<body>	
</html>
