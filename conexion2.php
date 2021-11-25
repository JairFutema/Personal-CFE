<?php
	//// Conexion a la BD //// 
	$servidor = "localhost";
	$usuario = "itesmeit_itesmei";
	$clave="^5zE]hcvfLRc";
	$base = "itesmeit_JairFutema"; // OJO aquí va el nombre de su BD 
	$conexion = new mysqli($servidor,$usuario,$clave,$base);
	if($conexion -> connect_errno)
	{
		die("Falló la conexión :(".$conexion -> mysqli_connect_errno().")".$conexion->mysqli_connect_error());
	
?>