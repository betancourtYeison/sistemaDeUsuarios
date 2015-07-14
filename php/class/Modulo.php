<?php
	class Modulo
	{	
		private $codigo;
		private $descripcion;		
		private $ruta;		
		private $tipo;		
		var $conexion;
				
		function Modulo( $codigo, $descripcion, $ruta, $tipo )
		{
			$this->codigo = $codigo;
			$this->descripcion = $descripcion;			
			$this->ruta = $ruta;			
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
		
		function getRuta()
		{
			return $this->ruta;
		}
		
		function setRuta( $ruta )
		{
			$this->ruta = $ruta;
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
		
		function insertarModulo()
		{			
			$query = "INSERT INTO modulo( codigomodulo, descripcion, ruta, tipo )
			values( $this->codigo, '$this->descripcion', '$this->ruta', '$this->tipo' )";			
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();						
		}
		
		function modificarModulo( $valor )
		{
			$query = "UPDATE modulo SET descripcion = '$this->descripcion', ruta = '$this->ruta', tipo = '$this->tipo' WHERE codigomodulo=$valor ";	
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}
		
		function eliminarModulo()
		{
			$query = "DELETE FROM modulo WHERE codigomodulo = '$this->codigo' ";		
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}

		function consultarUnModulo( $id )
		{			
			$query = "SELECT * 
					FROM modulo 
					WHERE codigomodulo=$id";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;				
		}
		
		//metodo que consulta todos los modulos y los imprime dentro de una tabla
		function consultarModulos( )
		{			
			$query = "SELECT * FROM modulo ORDER BY codigomodulo";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;		
		}
		
		//metodo que devuelve un arreglo con los modulos asociados al perfil 
		function consultarModulosPerfil( $perfil )
		{
			$query = "SELECT * FROM perfilmodulo WHERE codigoperfil = '$perfil' ORDER BY codigomodulo";			
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;
		}
		
		function consultarSubmodulosRecursos( )
		{
			$query = "SELECT * FROM modulo WHERE tipo = 2 ORDER BY codigomodulo";			
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;
		}	
	}	
?>