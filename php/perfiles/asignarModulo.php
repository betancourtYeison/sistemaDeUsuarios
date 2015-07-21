<?php	
	include("../lib/session.php");		
?>	
<html>	
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Proyecto de CreArteWeb para Sistemas de usuarios" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<title>Módulo Asignar</title>
		<link rel = "shortcut icon" type="image/x-icon" href = "../../img/favicon.ico" />	
		<link href = "../../css/estilo.css" rel="stylesheet" type="text/css" />		
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery-1.11.3.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
	</head>	
	<body>		
		<div class="container">		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='cabecera'>
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
				<image src='../../img/configuracion.png' class='img-responsive'>
				<h2>MÓDULO PERFILES</h2>			
			</div>

			<div align='center' class="col-lg-offset-3 col-md-offset-3">	
				<form class="form-horizontal" role="form" action="insertPerfilModulo.php" method="post">
			  	  	<div class="form-group">
			  	    	<label for="perfil" class="col-sm-2 control-label">Perfil:</label>
			  	    	<div class="col-sm-4">
			  	    		<select class="form-control" id="perfil" name='perfil'>
				  	      		<?php	
									$miPerfil = new Perfil("","");
									$miPerfil -> setConexion( $conexion );	
									$perfiles = $miPerfil -> consultarPerfiles( );						
									if( $perfiles )
									foreach( $perfiles as $perfil )
									{
										echo "<option value='$perfil[0]'>$perfil[1]</option>";																	
									}							
								?>		
							</select>
			  		    </div>
			  	  	</div>

		  	  	  	<div class="form-group">
			  	    	<label for="modulo" class="col-sm-2 control-label">Módulo:</label>
			  	    	<div class="col-sm-4">
			  	    		<select class="form-control" id="modulo" name='modulo'>
				  	      		<?php	
									$miModulo3 = new Modulo( "", "", "" );
									$miModulo3 -> setConexion( $conexion );	
									$modulos2 = $miModulo3 -> consultarModulos( );						
									if( $modulos2 )
									foreach( $modulos2 as $modulo )
									{
										echo "<option value='$modulo[0]'>$modulo[1]</option>";							
									}								
								?>		
							</select>
			  		    </div>
			  	  	</div>					

				  	<div class="form-group">
					    <div class="col-sm-8">
					    	<button type="submit" class="btn btn-primary">ASIGNAR</button>					    	
					    </div>
				  	</div>
				</form>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table align = "center" cellpadding = "10px" class = "table table-striped table-hover">				
						<tr align = "center">		 					 
							<th>PERFIL</th> 
							<th>MODULO</th>
							<th style="width:20px;"> </th>        					
						</tr>						
						<?php
							$miPerfilModulo = new PerfilModulo( "", "", "" );
							$miPerfilModulo->setConexion( $conexion );
							$usuarios = $miPerfilModulo -> consultarTodosPerfilModulo();
							if( $usuarios )
							foreach( $usuarios as $usuario )
							{
								echo 	
								"<tr>
									<td>$usuario[1]</td>
									<td>$usuario[2]</td>	
									<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalModulo$usuario[0]'>DESASIGNAR</button></td>
									<div align='center' class='modal fade bs-example-modal-smm' id='modalModulo$usuario[0]' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel'>
									  	<div class='modal-dialog modal-sm'>
									    	<div class='modal-content'>
									      		<div class='modal-header'>
									              	<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									              	<h4 class='modal-title' id='myModalLabel'>¿Estás seguro?</h4>
									            </div>
									            <div class='modal-body'>
									            	<a href='eliminarPerfilModulo.php?perfil=$usuario[0]'><button type='submit' class='btn btn-danger'>SI</button></a>
									            	<button type='button' class='btn btn-default' data-dismiss='modal'>NO</button>				            					              
									            </div>
									    	</div>
										</div>
									</div>
								</tr>";
							}
						?>						
					</table>
				</div>							
			</div>	

			<div id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
					include('../lib/footer.php');
				?>	
			</div>	
		</div>	
	</body>
</html>



