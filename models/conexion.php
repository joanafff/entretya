<?php 
	function crearConexion() {
		
		$host = "localhost";
		$user = "root";
		$pass = "";
		$baseDatos = "entre_telas_yaromas";

		//función para establecer la conexión a la base de datos
		$conexion= mysqli_connect($host, $user, $pass, $baseDatos); 
		
		return $conexion;
	}

	function cerrarConexion($conexion) {
		//función para cerrar la conexión a la base de datos
		mysqli_close($conexion);
	}
?>