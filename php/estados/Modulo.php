<?php
	class Modulo
	{	
		private $codigo;
		private $descripcion;		
		private $ruta;
		//private $tipo;
		var $conexion;
				
		function Modulo ( $codigo,  $descripcion, $ruta )
		{
			$this->codigo = $codigo;
			$this->descripcion = $descripcion;			
			$this->ruta = $ruta;	
			//$this->tipo = $tipo;
		}		
		
		function getCod()
		{
			return $this->$codigo;
		}
		
		function setCodigo( $codigo )
		{
			$this->codigo = $codigo;
		}
		
		function getDescripcion()
		{
			return $this->descripcion;
		}
		
		function setDescripcion( $descripcion )
		{
			$this->descripcion = $descripcion;
		}		
		
		function getRuta()
		{
			return $this->ruta;
		}
		
		function setRuta( $ruta )
		{
			$this->ruta = $ruta;
		}	
		/*function getTipo()
		{
			return $this->tipo;
		}
		
		function setTipo( $tipo )
		{
			$this->tipo = $tipo;*/
		}
		
		function setConexion ( $conexion )
		{
			$this -> conexion = $conexion;
		}
		
		function insertarModulo( )
		{			
			$query = "insert into modulo( codigomodulo, descripcion, ruta  )
			values( '$this->codigo', '$this->descripcion', '$this->ruta' )";			
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();						
		}
		
		function modificarModulo()
		{
			$query = "UPDATE modulo SET descripcion = '$this->descripcion', ruta = '$this->ruta' WHERE codigo = '$this->codigo'";	
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}
		
		function eliminarModulo()
		{
			$query = "DELETE FROM modulo WHERE codigo = '$this->codigo' ";		
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}

		function consultarUnModulo( $id )
		{			
			$query = "SELECT * FROM modulo WHERE codigo = '$id'";
			$this -> conexion -> conectar();			
			$this -> conexion -> consultarRegistro( $query );
			$fila = $this -> conexion -> obtenerResultado();						
			$this -> conexion -> cerrarConexion();
			return $fila;			
		}
		
		//metodo que consulta todos los modulos y los imprime dentro de una tabla
		function consultarModulos( )
		{			
			$query = "SELECT * FROM modulo ORDER BY codigo";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );				
			while( $fila = $this -> conexion->obtenerResultado() )
			{				
				echo "<tr align = 'center'> 
					<td>
						".$fila['0']."
					</td>
					<td>
						".$fila['1']."
					</td>
					<td>
						".$fila['2']."
					</td>	
					
				</tr>";						
			}				
		}
		
		//metodo que devuelve un arreglo con los modulos asociados al perfil 
		function consultarModulosPerfil( $perfil )
		{
			$query = "SELECT * FROM perfilmodulo WHERE idperfil = '$perfil' ORDER BY idmodulo";
			$this -> conexion -> conectar();
			$this -> conexion -> consultarRegistro( $query );
			$modulos = array(); // creo el array			
			while( $fila = $this -> conexion->obtenerResultado2() )
			{				
				array_push( $modulos, $fila["idmodulo"] ); 				
			}
			return $modulos;
		}		
		
		/*
		metodo que carga los modulos que tiene disponible un usuario segun su perfil, 
		el metodo recibe un arreglo con la lista de los id de los modulos
		*/
		function cargarModulosPerfil( $arregloModulos )
		{
			$this -> conexion -> conectar();			
			foreach( $arregloModulos as $valor )
			{
				$query = "SELECT * FROM modulo WHERE codigo = '$valor'";
				$this -> conexion -> consultarRegistro( $query );				
				while( $fila = $this -> conexion->obtenerResultado() )
				{					
					if( $fila['3'] == 3  )
					{							
						echo 
						"<li class='dropdown' id='menu1'>
							<a class='dropdown-toggle' data-toggle='dropdown' href='#menu1'>".$fila['1']."
								<b class='caret'></b>								
							</a>
							<ul class='dropdown-menu'>
								<li><a href='".$fila['2']."'>".$fila['1']."</a></li>
								<li><a href='../reservas/reservas.php'>RESERVAS</a></li>
								<li><a href='../prestamos/prestamos.php'>PRESTAMOS</a></li>
								<li><a href='../devoluciones/devoluciones.php'>DEVOLUCIONES</a></li>				             
							</ul>
						</li>";
					}
					if( $fila['3'] == 1  )
					{						
						echo "<li class='divider-vertical'><a href='".$fila['2']."'>".$fila['1']."</a></li>";
					}
				}
			}					
		}
		
		function consultarModulos2()
		{
			$query = "SELECT * FROM modulo ORDER BY codigo";
			$this -> conexion -> conectar();
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;
		}
	}	
?>