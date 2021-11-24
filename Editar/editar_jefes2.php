<?php 
	require "conexion.php";
	/// Consultar la BD 
	$jefes = "SELECT * FROM jefes";
	$resJefes=$conexion->query($jefes);
?>
<html>
	<head>
		<title> 
			Editar Jefes
		</title>
	</head>
	<body>
		<header>
			<h2 align = center> Editar Jefes </h2>
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
						<td><input name="idalu2['.$registroJefes['rpe'].']" value="'.$registroJefes['rpe'].'" readonly/></td>
						<td><input name="nom2['.$registroJefes['rpe'].']" value="'.$registroJefes['nombre'].'"/></td>
						<td><input name="carr2['.$registroJefes['rpe'].']" value="'.$registroJefes['area'].'"/></td>
						</tr>';
			}
			?>
		</table>
		<div align="center">
			<input type="submit" name="actualizar" value="Actualizar Jefes"/>
		</div>
	</form>
	<?php
		if(isset($_POST['actualizar']))
		{
			foreach ($_POST['idalu2'] as $ids2) 
			{
				$editid=mysqli_real_escape_string($conexion,$_POST['idalu2'][$ids2]);
				$editnom=mysqli_real_escape_string($conexion,$_POST['nom2'][$ids2]);
				$editcarr=mysqli_real_escape_string($conexion,$_POST['carr2'][$ids2]);
				$actualizar=$conexion->query("UPDATE jefes set rpe = '$editid', nombre = '$editnom', area = '$editcarr' where rpe = '$ids2'");
			}
			header("location:editar_jefes2.php");
		}
	?>
		<br>
		<div align="center">
			<a href="index.html" target="_parent"><button> Volver al inicio </button></a>
		</div>	
	</body>
</html>