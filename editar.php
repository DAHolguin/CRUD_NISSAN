<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
// Incluyendo el archivo de conexión a la base de datos
include_once("conexion.php");

if (isset($_POST['update'])) {
	$id_cliente = $_POST['id_cliente'];
	$nombre = $_POST['nombre'];
	$apellidoP = $_POST['apellidoP'];
	$apellidoM = $_POST['apellidoM'];
	$curp = $_POST['curp'];
	$edad = $_POST['edad'];
	$metodo_de_pago = $_POST['metodo_de_pago'];
	$domicilio = $_POST['domicilio'];
	$telefono = $_POST['telefono'];

	// Verificar campos vacíos
	if ( empty($id_cliente) || empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($curp) || empty($edad) || empty($metodo_de_pago) || empty($domicilio) || empty($telefono)) {
		if (empty($id_cliente)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}
		if (empty($nombre)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($apellidoP)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($apellidoM)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($curp)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($edad)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($metodo_de_pago)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($domicilio)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}
		if (empty($telefono)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

	} else {
		// Actualizando la tabla
// Actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE cliente SET nombre='$nombre', apellidoP='$apellidoP', apellidoM='$apellidoM', curp='$curp', edad='$edad', metodo_de_pago='$metodo_de_pago', domicilio='$domicilio', telefono='$telefono'  WHERE id_cliente='$id_cliente'");

		// Redireccionando a la página de visualización. En este caso, es ver.php
		header("Location: ver.php");
	}
}
?>

<?php
// Obtener el id del URL
$id_cliente = $_GET['id_cliente'];

if ($id_cliente != '') {
	// Seleccionar los datos asociados con este id particular
	$resultado = mysqli_query($mysqli, "SELECT * FROM cliente WHERE id_cliente=$id_cliente");

	while ($res = mysqli_fetch_array($resultado)) {
		$id_cliente = $res['id_cliente'];
		$nombre = $res['nombre'];
		$apellidoP = $res['apellidoP'];
		$apellidoM = $res['apellidoM'];
		$curp = $res['curp'];
		$edad = $res['edad'];
		$metodo_de_pago = $res['metodo_de_pago'];
		$domicilio = $res['domicilio'];
		$telefono = $res['telefono'];
	}
} else {
	echo "ID de id_cliente no encontrado en la URL. Asegúrate de pasar el ID correctamente.";
}
?>


<html>

<head>
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver apellidoMs</a> | <a href="cerrar.php">Cerrar Sesión</a>
	<br /><br />

	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr>
				<td>Id Cliente</td>
				<td><input type="text" name="id_cliente" value="<?php echo $id_cliente; ?>"></td>
			</tr>
			<tr>
				<td>nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre; ?>"></td>
			</tr>
			<tr>
				<td>apellido Paterno</td>
				<td><input type="text" name="apellidoP" value="<?php echo $apellidoP; ?>"></td>
			</tr>
			<tr>
				<td>apellido Materno</td>
				<td><input type="text" name="apellidoM" value="<?php echo $apellidoM; ?>"></td>
			</tr>
			<tr>
				<td>curp</td>
				<td><input type="text" name="curp" value="<?php echo $curp; ?>"></td>
			</tr>
			<tr>
				<td>edad</td>
				<td><input type="number" name="edad" value="<?php echo $edad; ?>"></td>
			</tr>
			<tr>
				<td>Metodo de Pago</td>
				<td><input type="text" name="metodo_de_pago" value="<?php echo $metodo_de_pago; ?>"></td>
			</tr>
			<tr>
				<td>domicilio</td>
				<td><input type="text" name="domicilio" value="<?php echo $domicilio; ?>"></td>
			</tr>
			<tr>
				<td>telefono</td>
				<td><input type="text" name="telefono" value="<?php echo $telefono; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_cliente" value=<?php echo $_GET['id_cliente']; ?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>

</html>