
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
			$query = "INSERT INTO perfilmodulo( codigo, idPerfil, idModulo )
			values( '$this->codigo', '$this->idPerfil', '$this->idModulo' )";			
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();						
		}
		/*
		function modificarPerfilModulo()
		{
			$query = "UPDATE perfilmodulo SET descripcion = '$this->descripcion', ruta = '$this->ruta' WHERE codigo = '$this->codigo'";	
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}
		
		function eliminarPerfilModulo()
		{
			$query = "DELETE FROM modulo WHERE codigo = '$this->codigo' ";		
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}*/

		function consultarUnPerfilModulo( $id )
		{			
			$query = "SELECT * FROM perfilmodulo WHERE codigo = '$id'";
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
	}	
?>