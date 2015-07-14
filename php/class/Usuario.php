<?php
	class Usuario
	{	
		private $cedula;
		private $nombre;
		private $apellido;
		private $correo;
		private $telefono;
		private $estado; 
		private $pass;
		private $perfil;
		private $deuda;		
		var $conexion;
			
		function Usuario( $cedula,  $nombre,  $apellido,  $correo,  $telefono,  $estado, $pass,  $perfil,  $deuda )
		{
			$this->cedula = $cedula;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->correo = $correo;
			$this->telefono = $telefono;
			$this->estado = $estado;
			$this->pass = $pass;
			$this->perfil = $perfil;
			$this->deuda = $deuda;
		}		
		
		function getCedula()
		{
			return $this->cedula;
		}
		
		function setCedula( $cedula )
		{
			$this->cedula = $cedula;
		}
		
		function getNombre()
		{
			return $this->nombre;
		}
		
		function setNombre( $nombre )
		{
			$this->nombre = $nombre;
		}	
		
		function getApellido()
		{
			return $this->apellido;
		}
		
		function setApellido( $apellido )
		{
			$this->apellido = $apellido;
		}
		
		function getCorreo()
		{
			return $this->correo;
		}
		
		function setCorreo( $correo )
		{
			$this->correo = $correo;			
		}
		
		function getTelefono()
		{
			return $this->telefono;
		}
		
		function setTelefono( $telefono )
		{
			$this->telefono = $telefono;			
		}
		
		function getEstado()
		{
			return $this->estado;
		}
		
		function setEstado( $estado )
		{
			$this->estado = $estado;			
		}
		
		function getPass()
		{
			return $this->pass;
		}
		
		function setPass( $pass )
		{
			$this->pass = $pass;			
		}
		
		function getPerfil()
		{
			return $this->perfil;
		}
		
		function setPerfil( $perfil )
		{
			$this->perfil = $perfil;			
		}
		
		function getDeuda()
		{
			return $this->deuda;
		}
		
		function setDeuda( $deuda )
		{
			$this->deuda = $deuda;
		}
		
		function setConexion ( $conexion )
		{
			$this -> conexion = $conexion;
		}
		
		function insertarUsuario(  )
		{			
			$query = "insert into usuario( cedula, nombre, apellido, correo, telefono, codigoestado, pass, codigoperfil, deuda )
			values( '$this->cedula', '$this->nombre', '$this->apellido', '$this->correo', '$this->telefono', '$this->estado', 
			'$this->pass',  '$this->perfil',  '$this->deuda' )";			
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();						
		}
		
		function modificarUsuario()
		{
			$query = "UPDATE usuario SET nombre = '$this->nombre', apellido = '$this->apellido', correo = '$this->correo',
			telefono = '$this->telefono', codigoestado = '$this->estado', pass = '$this->pass', codigoperfil = '$this->perfil', deuda = '$this->deuda'
			WHERE cedula = '$this->cedula'";		
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}
		
		function eliminarUsuario()
		{
			$query = "DELETE FROM usuario WHERE cedula = '$this->cedula' ";		
			
			$this -> conexion -> conectar();
			$this -> conexion -> ejecutarRegistro( $query );
			$this -> conexion -> cerrarConexion();	
		}

		function consultarUnUsuario( $id )
		{			
			$query = "SELECT * FROM usuario WHERE cedula='$id'";
			$this -> conexion -> conectar();			
			$this -> conexion -> consultarRegistro( $query );
			$fila = $this -> conexion -> obtenerResultado();						
			$this -> conexion -> cerrarConexion();
			return $fila;			
		}
		
		//metodo que consulta todos los usuarios
		function consultarUsuarios( )
		{
			$query = "SELECT usuario.cedula, usuario.nombre, usuario.apellido, usuario.correo, usuario.telefono, estado.descripcion,
			perfil.descripcion, usuario.deuda
			FROM usuario, estado, perfil
			WHERE usuario.codigoestado=estado.codigoestado
			AND usuario.codigoperfil=perfil.codigoperfil";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;
		}

		function loginUsuario( $cedula, $pass )
		{
			$query = "SELECT * FROM usuario WHERE cedula = $cedula AND pass = $pass";
			$this -> conexion -> conectar();				
			$this -> conexion -> consultarRegistro( $query );			
			$matrix = $this -> conexion->getMatrix();
			return $matrix;
		}
	}	
?>