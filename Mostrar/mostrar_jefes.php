<?php 
	require "conexion.php";
	/// Consultar la BD 
	$jefes = "SELECT * FROM jefes";
	$resjefes=$conexion->query($jefes);
?>
<html lang="es">
	<head>
		<title> 
			<title>Mostrar Jefes</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		</title>
		<meta charset="utf-8"/>
	<body>
		<header>
			<h2 align=center>
				Informacion Jefes de Area
			</h2>
		</header>
		<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Rpe Jefe </th>
					<th class="pad-basic">Nombre </th>
					<th class="pad-basic">Area </th>
					
				<tr>
			<?php
			/// Vamos a mostrar la tabla Jefes
			while($registrojefes = $resjefes->fetch_array(MYSQLI_BOTH))
			{
				echo'<tr>
				<td>'.$registrojefes['rpe'].'</td>
				<td>'.$registrojefes['nombre'].'</td>
				<td>'.$registrojefes['area'].'</td>
				</tr>';
			}
			?>
		</table>
		<br>
		<div align="center">
			<a href="index.html" target="_parent"><button> Volver al inicio </button></a>
		</div>	
	</body>
</html>