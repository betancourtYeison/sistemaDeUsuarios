<script type="text/javascript" src="../../js/bootstrap.js"></script> <script type="text/javascript" src="../../js/bootstrap-dropdown.js"></script>			<ul class="nav nav-tabs">				<li class="active">					<a href="#">INICIO</a>				</li>				<?php					$arraySubmodulos = array();					$miModulo = new Modulo( "", "", "", "" );					$miModulo -> setConexion( $conexion );							//consultamos todos los modulos que estan asociados al perfil del usuario					$modulosPerfil = $miModulo -> consultarModulosPerfil( $miUsuario->getPerfil() );											//miramos si hay resultados, es decir si algun modulo esta asociado al perfil					if( $modulosPerfil )					//recorremos el arreglo					foreach( $modulosPerfil as $moduloP )					{						//consultamos la informacion del modulo, de la pocision i						$modulo = $miModulo->consultarUnModulo( $moduloP[2] );						if( $modulo )																foreach( $modulo as $modulo2 )						{							if( $modulo2['3'] == 1  )							{														echo "<li class='divider-vertical'><a href='".$modulo2['2']."'>".$modulo2['1']."</a></li>";							}							if( $modulo2['3'] == 3  )							{								echo 									"<li class='dropdown' id='menu1'>										<a class='dropdown-toggle' data-toggle='dropdown' href='#menu1'>".$modulo2['1']."											<b class='caret'></b>																		</a>									<ul class='dropdown-menu'>										<li><a href='".$modulo2['2']."'>".$modulo2['1']."</a></li>";										$submodulosRecurso = $miModulo->consultarSubmodulosRecursos();										if( $submodulosRecurso )																				foreach( $submodulosRecurso as $modulo3 )										{											echo "<li><a href='".$modulo3['2']."'>".$modulo3['1']."</a></li>";										}										echo"									</ul>								</li>";							}														}															}						?>				</ul>	