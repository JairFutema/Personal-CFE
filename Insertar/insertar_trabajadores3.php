<?php 
	require "conexion.php";
	/// Consultar la BD 
	$trabajadores = "SELECT * FROM trabajadores order by Rpe";
	$restrabajadores=$conexion->query($trabajadores);
?>
<html lang="es">
	<head>
		<title> 
			<title>Agregar Trabajadores</title>
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
				Agregar Trabajadores
			</h2>
		</header>
		<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Rpe Trabajador </th>
					<th class="pad-basic">Nombre </th>
					<th class="pad-basic">Area </th>
					<th class="pad-basic">Autorizo </th>
					
					
				<tr>
			<?php
			/// Vamos a mostrar la tabla Alumnos
			while($registroTrabajadores = $restrabajadores-> fetch_array(MYSQLI_BOTH))
			{
				echo'<tr>
						<td>'.$registroTrabajadores['rpe'].'</td>
						<td>'.$registroTrabajadores['tra_nombre'].'</td>
						<td>'.$registroTrabajadores['categoria'].'</td>
						<td>'.$registroTrabajadores['autorizo'].'</td>
						</tr>';
			}
			 ?>
		</table>
		<!-- Aquí vamos a hacer el procedimiento para insersión --> 
		<form method="post">
			<h3 align = center> Agregar Nuevo Trabajador </h3>
			<table align=center>
				<tr>
					<td><input required name="rpe" placeholder="Rpe Trabajador"/></td>
					<td><input required name="tra_nombre" placeholder="Nombre Trabajador"/></td>
					<td><input required name="categoria" placeholder="Area"/></td>
					<td><input required name="autorizo" placeholder="Autorizo"/></td>
					
				</tr>
			</table>
			<div align="center">
				<input type="submit" name="insertar" value="Insertar Trabajador">
			</div>
		</form>
		<!-- Lo del botón insertar--> 
		<?php
			if(isset($_POST['insertar']))
			{
				$id = $_POST['rpe'];
				$nom = $_POST['tra_nombre'];
				$carr = $_POST['categoria'];
				$au = $_POST['autorizo'];
				mysqli_query($conexion,"INSERT INTO trabajadores (rpe, tra_nombre, categoria, autorizo) values ('$id','$nom','$carr','$au')") or die (mysqli_error($conexion));
				header("location:insertar_trabajadores3.php");
			}
		?>
		<br>
		<div align="center">
			<a href="index.html" target="_parent"><button> Volver al inicio </button></a>
		</div>	
	</body>
</html>