<?php 
	require "conexion.php";
	/// Consultar la BD 
	$trabajadores = "SELECT * FROM trabajadores";
	$restrabajadores=$conexion->query($trabajadores);
?>
<html>
	<head> 
		<title>Mostrar Trabajador</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<h2 align=center>
				Informacion del Trabajador
			</h2>
		</header>
		<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Rpe Trabajador </th>
					<th class="pad-basic">Nombre </th>
					<th class="pad-basic">Categoria </th>
					<th class="pad-basic">Autorizo </th>
				<tr>
		
			<?php
			/// Vamos a mostrar la tabla Alumnos
			while($registrotrabajadores = $restrabajadores->fetch_array(MYSQLI_BOTH))
			{
				echo '<tr>
						<td>'.$registrotrabajadores['rpe'].'</td>
						<td>'.$registrotrabajadores['tra_nombre'].'</td>
						<td>'.$registrotrabajadores['categoria'].'</td>
						<td>'.$registrotrabajadores['autorizo'].'</td>
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