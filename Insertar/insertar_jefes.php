<?php 
	require "conexion.php";
	/// Consultar la BD 
	$jefes = "SELECT * FROM jefes order by rpe";
	$resjefes=$conexion->query($jefes);
?>
<html lang="es">
	<head>
		<title> 
			<title>Agregar Jefes de Area</title>
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
				Agregar Jefes de Area
			</h2>
		</header>
		<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Rpe Jefe </th>
					<th class="pad-basic">Nombre </th>
					<th class="pad-basic">Area </th>
					
				<tr>
			<?php
			/// Vamos a mostrar la tabla de Jefes
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
		<!--formulario para la insercion -->
		<form method="post">
			<h3 alingn = center> Agregar Datos del Jefe de Area </h3>
			<table align= center>
				<tr>
					<td><input required name="rpe" placeholder="Rpe"/></td>
					<td><input required name="nombre" placeholder="Nombre"/></td>
					<td><input required name="area" placeholder="Area"/></td>
				
				</tr>
			</table>
			<div align= center>
					<input type="submit" name="insertar" value="Insertar Jefe"/>
			</div>
		</form>
		<!--Acciones del Boton Insertar -->
		<?php 
			if(isset($_POST['insertar']))
			{
				$idj = $_POST['rpe'];
				$nomj = $_POST['nombre'];
				$catj = $_POST['area'];
				mysqli_query($conexion,"insert into jefes (Rpe, Nombre, Area) values ('$idj','$nomj','$catj')") or die(mysqli_errno($conexion));
				header("location:insertar_jefes.php");
			}
		 ?>
		<div align="center">
			<a href="index.html" target="_parent"><button> Volver al inicio </button></a>
		</div>	
	</body>
</html>