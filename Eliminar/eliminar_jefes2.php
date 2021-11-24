<?php 
	require "conexion.php";
	/// Consultar la BD 
	$jefes = "SELECT * FROM jefes";
	$resJefes=$conexion->query($jefes);
?>
<html>
	<head>
		<title> 
			Eliminar Jefes
		</title>
	</head>
	<body>
		<header>
			<h2 align = center> Eliminar Jefes </h2>
		</header>
		<form method="post">
		<table align=center> 
			<tr>
				<th>Rpe Jefe</th>
				<th>Nombre</th>
				<th>Area</th>
				
			</tr>
			<?php
			/// Vamos a mostrar la tabla Alumnos
			while($registroJefes = $resJefes -> fetch_array(MYSQLI_BOTH))
			{
				echo '<tr>
						<td>'.$registroJefes['rpe'].'</td>
						<td>'.$registroJefes['nombre'].'</td>
						<td>'.$registroJefes['area'].'</td>
						
						<td><input type="checkbox" name ="eliminar[]" value="'.$registroJefes['rpe'].'"/><td>
						</tr>';
			}
			?>
		</table>
		<div align="center">
			<input type="submit" name = "borrar" value = "Eliminar Jefe" onclick="reload()"/>
		</div>
		<?php
			if(isset($_POST['borrar']))
			{
				if(empty($_POST['eliminar']))
				{
					echo'<h2 align="center"> No se ha seleccionado ningún registro </h2>';
				}
				else
				{
					foreach ($_POST['eliminar'] as $id_borrar) 
					{
						$borrarAlumnos = $conexion->query("DELETE FROM jefes WHERE rpe = '$id_borrar'");
					}
					header("location:eliminar_jefes2.php");
				}
			}
		?>
		<br>
		<div align="center">
			<a href="index.html" target="_parent"><button> Volver al inicio </button></a> <!--OJO--> 
		</div>	
	</body>
</html>