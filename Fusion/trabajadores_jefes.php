<?php 
require "conexion.php";
?>

<html lang="es">
	<head> 
		<title>Mostrar Jefes y Trabajadores</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h3>Unir Varias Tablas con una Consulta (INNER JOIN)</h3>
			</div>
		</header>

		<section>
			<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Rpe Trabajador </th>
					<th class="pad-basic">Nombre </th>
					<th class="pad-basic">Area </th>
					<th class="pad-basic">Jefe de Area</th>
				<tr>

				<?php

					$query= "SELECT trabajadores.rpe, trabajadores.tra_nombre, trabajadores.autorizo,
							   		jefes.nombre, jefes.area							   
						FROM trabajadores  
						INNER JOIN jefes ON trabajadores.categoria = jefes.area";
						
					$consulta=$conexion->query($query);
					///while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					while ($fila = $consulta->fetch_array())
					{
						echo'
						<tr>
						<td>'.$fila['rpe'].'</td>
						<td>'.$fila['tra_nombre'].'</td>
						<td>'.$fila['area'].'</td>
						<td>'.$fila['nombre'].'</td>
						</tr>
						';
					}

				?>

			</table>
			<br>
			<div align="center">
				<a href="index.html" target="_parent"><button> Volver al inicio </button></a>
			</div>	
		</section>
</body>
</html>

