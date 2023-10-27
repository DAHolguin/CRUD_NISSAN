<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include_once("conexion.php");

$resultado = mysqli_query($mysqli, "SELECT * FROM cliente WHERE id=".$_SESSION['id']." ORDER BY id_cliente DESC");
?>

<html>
<head>
	<title>Página principal</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="cerrar.php">Cerrar sesión</a>
	<br/><br/>

	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id Cliente</td>
			<td>nombre</td>
			<td>apellido paterno</td>
			<td>apellido materno</td>
			<td>curp</td>
			<td>edad</td>
			<td>metodo de pago</td>
			<td>domicilio</td>
			<td>telefono</td>
			<td>Opciones</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id_cliente']."</td>";
			echo "<td>".$res['nombre']."</td>";
			echo "<td>".$res['apellidoP']."</td>";
			echo "<td>".$res['apellidoM']."</td>";
			echo "<td>".$res['curp']."</td>";
			echo "<td>".$res['edad']."</td>";	
			echo "<td>".$res['metodo_de_pago']."</td>";
			echo "<td>".$res['domicilio']."</td>";
			echo "<td>".$res['telefono']."</td>";
			echo "<td><a href=\"editar.php?id_cliente=$res[id_cliente]\">Editar</a> | <a href=\"eliminar.php?id_cliente=$res[id_cliente]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
