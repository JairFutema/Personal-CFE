<?php 
	require "conexion.php";
	/// Consultar la BD 
	$trabajadores = "SELECT * FROM trabajadores";
	$resTrabajadores=$conexion->query($trabajadores);
?>
<html>
	<head>
		<title> 
			Eliminar Trabajadores
		</title>
	</head>
	<body>
		<header>
			<h2 align = center> Eliminar Trabajadores </h2>
		</header>
		<form method="post">
		<table align=center> 
			<tr>
				<th>ID Alumno</th>
				<th>Nombre</th>
				<th>Categoria</th>
				<th>Autorizo</th>
			</tr>
			<?php
			/// Vamos a mostrar la tabla Alumnos
			while($registroTrabajadores = $resTrabajadores -> fetch_array(MYSQLI_BOTH))
			{
				echo '<tr>
						<td>'.$registroTrabajadores['rpe'].'</td>
						<td>'.$registroTrabajadores['tra_nombre'].'</td>
						<td>'.$registroTrabajadores['categoria'].'</td>
						<td>'.$registroTrabajadores['autorizo'].'</td>
						<td><input type="checkbox" name ="eliminar[]" value="'.$registroTrabajadores['rpe'].'"/><td>
						</tr>';
			}
			?>
		</table>
		<div align="center">
			<input type="submit" name = "borrar" value = "Eliminar Trabajadores" onclick="reload()"/>
		</div>
		<?php
			if(isset($_POST['borrar']))
			{
				if(empty($_POST['eliminar']))
				{
					echo'<h2 align="center"> No se ha seleccionado ningún registros </h2>';
				}
				else
				{
					foreach ($_POST['eliminar'] as $id_borrar) 
					{
						$borrarAlumnos = $conexion->query("DELETE FROM trabajadores WHERE rpe = '$id_borrar'");
					}
					header("location:eliminar_trabajadores2.php");
				}
			}
		?>
		<br>
		<div align="center">
			<a href="index.html" target="_parent"><button> Volver al inicio </button></a> <!--OJO--> 
		</div>	
	</body>
</html>