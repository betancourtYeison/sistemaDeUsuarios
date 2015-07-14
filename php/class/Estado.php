<?php
	class Estado
	{	
		private $codigo;
		private $descripcion;			
		private $tipo;			
		var $conexion;
				
		function Estado( $codigo,  $descripcion, $tipo )
		{
			$this->codigo = $codigo;
			$this->descripcion = $descripcion;			
			$this->tipo = $tipo;			
		}		
		
		function getCodigo()
		{
			return $this->codigo;
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
		
		function getTipo()
		{
			return $this->tipo;
		}
		
		function setTipo( $tipo )
		{
			$this->tipo = $tipo;
		}
		
		function setConexion ( $conexion )
		{
			$this -> conexion = $conexion;
		}
		
		function insertarEstado(  )
		{			
			$query = "INSERT INTO estado( codigoestado, descripcion, tipo )
			VALUES( '$this->codigo', '$this->descripcion', '$this->tipo' )";
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();						
		}
		
		function modificarEstado()
		{
			$query = "UPDATE estado SET descripcion = '$this->descripcion', tipo='$this->tipo' WHERE codigoestado = '$this->codigo'";	
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}
		
		function eliminarEstado()
		{
			$query = "DELETE FROM estado WHERE codigoestado = '$this->codigo' ";		
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}

		function consultarUnEstado( $id )
		{			
			$query = "SELECT * FROM estado WHERE codigoestado='$id'";
			
			$this -> conexion -> conectar();			
			$this -> conexion -> consultarRegistro( $query );
			$fila = $this -> conexion -> obtenerResultado();						
			$this -> conexion -> cerrarConexion();
			return $fila;			
		}
		
		//metodo que consulta todos los perfiles	
		function consultarEstadoUsuario( )
		{
			$query = "SELECT * FROM estado WHERE tipo=1 ORDER BY codigoestado";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;
		}
		
		function consultarEstados( )
		{
			$query = "SELECT * FROM estado ORDER BY codigoestado";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;
		}
	}	
?>