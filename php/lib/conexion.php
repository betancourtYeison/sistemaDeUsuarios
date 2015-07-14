<?php	
	class Conexion
	{
		private $servidor;
		private $bd;
		private $usuario;
		private $pass;
		
		private $enlace;
		private $consulta;
		private $resultado;
		
		function Conexion( $servidor, $bd, $usuario, $pass )
		{
			$this->servidor = $servidor;
			$this->bd = $bd;
			$this->usuario = $usuario;
			$this->pass = $pass;
		}
		
		function getUser()
		{
			return $this->usuario;
		}
		
		function conectar()
		{	
			$this->enlace = mysql_connect( $this->servidor, $this->usuario);
			if( !$this->enlace )
			{	
				die( "Error al conectar : " . mysql_error() );
			}
			else
			{
				mysql_select_db( $this->bd, $this->enlace );				
			}	
		}
		
		function cerrarConexion()
		{
			mysql_close( $this->enlace );
		}
		
		function ejecutarRegistro( $query )
		{
			if ( !mysql_query( $query, $this->enlace ) )			
			{
				die( "Error : " . mysql_error() );
			}			
			echo "<br></br><h2 align='center'>EL PROCESO HA SIDO EXITOSO</h2>";
		}	
		
		function consultarRegistro( $query )
		{			
			$this->consulta = mysql_query( $query, $this->enlace );
		}
		
		function consultarRegistro2( $query )
		{			
			return $this->consulta = mysql_query( $query, $this->enlace );
		}

		function obtenerResultado()
		{
			$this->resultado = mysql_fetch_row( $this->consulta );
			return $this->resultado;
		}	
		
		function obtenerResultado2()
		{
			$this->resultado = mysql_fetch_array( $this->consulta );
			return $this->resultado;
		}	
		
		function getMatrix()
		{
			$matrix = array();			
			while( $row = mysql_fetch_array( $this->consulta ) )
			{
				$matrix[] = $row;
			}			
			return $matrix;
		}
	}		
?>
