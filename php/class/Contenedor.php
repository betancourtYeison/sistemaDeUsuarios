<?php  
	
	class Contenedor
	{
		var $conexion;

		function  Contenedor($conexion)
		{
			$this->conexion = $conexion;
		}

		function consultaContenedor($contenedor)
		{
			$this->conexion->conectar();				
			$consulta = "SELECT * FROM contenedores WHERE nombre_contenedor = '".$contenedor."'";			
			return $this->conexion->consultarRegistro2($consulta);
		}

		function actualizaContenedor($contenedor, $colorLetra, $tamanoLetra, $tipoLetra, $colorFondo)
		{
			$this->conexion->conectar();				
			$consulta = "UPDATE contenedores SET color_letra = '".$colorLetra."', tamano_letra = '".$tamanoLetra."', 
			tipo_letra = '".$tipoLetra."', color_fondo = '".$colorFondo."' WHERE nombre_contenedor = '".$contenedor."'";			
			$this->conexion->ejecutarRegistro($consulta);
		}

	}




 	 	 	
?>