<?php 
	require "conexion.php";
	/// Consultar la BD 
	$trabajadores = "SELECT * FROM trabajadores";
	$resTrabajadores=$conexion->query($trabajadores);
?>
<html>
	<head>
		<title> 
			Editar Trabajadores
		</title>
	</head>
	<body>
		<header>
			<h2 align = center> Editar Trabajadores </h2>
		</header>
		<form method="post">
		<table align=center> 
			<tr>
				<th>Rpe Trabajador</th>
				<th>Nombre</th>
				<th>Area</th>
				<th>Autorizo</th>
			</tr>
			<?php
			/// Vamos a mostrar la tabla Alumnos
			while($registroTrabajadores = $resTrabajadores -> fetch_array(MYSQLI_BOTH))
			{
				echo '<tr>
						<td><input name="idalu['.$registroTrabajadores['rpe'].']" value="'.$registroTrabajadores['rpe'].'" readonly/></td>
						<td><input name="nom['.$registroTrabajadores['rpe'].']" value="'.$registroTrabajadores['tra_nombre'].'"/></td>
						<td><input name="carr['.$registroTrabajadores['rpe'].']" value="'.$registroTrabajadores['categoria'].'"/></td>
						<td><input name="gru['.$registroTrabajadores['rpe'].']" value="'.$registroTrabajadores['autorizo'].'"/></td>
						</tr>';
			}
			?>
		</table>
		<div align="center">
			<input type="submit" name="actualizar" value="Actualizar los Trabajadores"/>
		</div>
	</form>
	<?php
		if(isset($_POST['actualizar']))
		{
			foreach ($_POST['idalu'] as $ids) 
			{
				$editID=mysqli_real_escape_string($conexion,$_POST['idalu'][$ids]);
				$editNom=mysqli_real_escape_string($conexion,$_POST['nom'][$ids]);
				$editCarr=mysqli_real_escape_string($conexion,$_POST['carr'][$ids]);
				$editGru=mysqli_real_escape_string($conexion,$_POST['gru'][$ids]);
				$actualizar=$conexion->query("UPDATE trabajadores set rpe = '$editID', tra_nombre = '$editNom', categoria = '$editCarr', autorizo = '$editGru' where rpe = '$ids'");
			}
			header("location:editar_trabajadores2.php");
		}
	?>
		<br>
		<div align="center">
			<a href="index.html" target="_parent"><button> Volver al inicio </button></a>
		</div>	
	</body>
</html>