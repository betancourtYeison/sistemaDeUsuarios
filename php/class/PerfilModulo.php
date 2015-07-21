<?php
	class PerfilModulo
	{	
		private $codigo;
		private $idPerfil;		
		private $idModulo;		
		var $conexion;
				
		function PerfilModulo( $codigo, $idPerfil, $idModulo )
		{
			$this->codigo = $codigo;
			$this->idPerfil = $idPerfil;			
			$this->idModulo = $idModulo;			
		}		
		
		function getCodigo()
		{
			return $this->$codigo;
		}
		
		function setCodigo( $codigo )
		{
			$this->codigo = $codigo;
		}
		
		function getIdPerfil()
		{
			return $this->idPerfil;
		}
		
		function setIdPerfil( $idPerfil )
		{
			$this->idPerfil = $idPerfil;
		}		
		
		function getIdModulo()
		{
			return $this->idModulo;
		}
		
		function setIdModulo( $idModulo )
		{
			$this->idModulo = $idModulo;
		}				
		
		function setConexion ( $conexion )
		{
			$this -> conexion = $conexion;
		}
		
		function insertarPerfilModulo()
		{			
			$query = "INSERT INTO perfilmodulo( codigoperfil, codigomodulo )
			values( '$this->idPerfil', '$this->idModulo' )";			
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();						
		}
		
		function modificarPerfilModulo()
		{
			$query = "UPDATE perfilmodulo SET descripcion = '$this->descripcion', ruta = '$this->ruta' WHERE codigo = '$this->codigo'";	
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}
		
		function eliminarPerfilModulo()
		{
			$query = "DELETE FROM perfilmodulo WHERE codigo = '$this->codigo' ";		
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}

		function consultarUnPerfilModulo( $id )
		{			
			$query = "SELECT * FROM perfilmodulo WHERE codigo = '$id'";
			$this -> conexion -> conectar();			
			$this -> conexion -> consultarRegistro( $query );
			$fila = $this -> conexion -> obtenerResultado();						
			$this -> conexion -> cerrarConexion();
			return $fila;			
		}
		
		function consultarPerfilAsignadoModulo()
		{			
			$query = "SELECT count(*)
					FROM perfilmodulo 
					WHERE codigoperfil = '$this->idPerfil' 
					AND codigomodulo = '$this->idModulo'";
			$this -> conexion -> conectar();			
			$this -> conexion -> consultarRegistro( $query );
			$fila = $this -> conexion -> obtenerResultado();						
			$this -> conexion -> cerrarConexion();
			return $fila;			
		}
		
		//metodo que consulta todos los perfiles y los imprime dentro de una tabla
		function consultarPerfilModulo( )
		{			
			$query = "SELECT * FROM perfilmodulo ORDER BY codigo";
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
				</tr>";						
			}				
		}		
		function consultarTodosPerfilModulo( )
		{	
			$query = "SELECT perfilmodulo.codigo, perfil.descripcion, modulo.descripcion 
			FROM perfilmodulo, perfil, modulo
			WHERE perfilmodulo.codigoperfil = perfil.codigoperfil
			AND perfilmodulo.codigomodulo = modulo.codigomodulo
			GROUP BY  perfil.descripcion, modulo.descripcion
			ORDER BY perfil.descripcion";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;	
		}
	}	
?>