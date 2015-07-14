<?php
	class Perfil
	{	
		private $codigo;
		private $descripcion;			
		var $conexion;
				
		function Perfil( $codigo,  $descripcion )
		{
			$this->codigo = $codigo;
			$this->descripcion = $descripcion;			
		}		
		
		function getCod()
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
		
		function setConexion ( $conexion )
		{
			$this -> conexion = $conexion;
		}
		
		function insertarPerfil(  )
		{			
			$query = "insert into perfil( codigoperfil, descripcion )
			values( '$this->codigo', '$this->descripcion' )";			
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();						
		}
		
		function modificarPerfil()
		{
			$query = "UPDATE perfil SET descripcion = '$this->descripcion' WHERE codigoperfil = '$this->codigo'";	
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}
		
		function eliminarPerfil()
		{
			$query = "DELETE FROM perfil WHERE codigoperfil = '$this->codigo' ";		
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}

		function consultarUnPerfil( $id )
		{			
			$query = "SELECT * FROM perfil WHERE codigoperfil='$id'";
			$this -> conexion -> conectar();			
			$this -> conexion -> consultarRegistro( $query );
			$fila = $this -> conexion -> obtenerResultado();						
			$this -> conexion -> cerrarConexion();
			return $fila;			
		}
		
		//metodo que consulta todos los perfiles	
		function consultarPerfiles( )
		{
			$query = "SELECT * FROM perfil ORDER BY codigoperfil";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;
		}
	}	
?>