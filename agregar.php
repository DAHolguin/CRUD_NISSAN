<?php
session_start();

if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$id_cliente = $_POST['id_cliente'];
	$nombre = $_POST['nombre'];
	$apellidoP = $_POST['apellidoP'];
	$apellidoM = $_POST['apellidoM'];
	$curp = $_POST['curp'];
	$edad = $_POST['edad'];
	$metodo_de_pago = $_POST['metodo_de_pago'];
	$domicilio = $_POST['domicilio'];
	$telefono = $_POST['telefono'];
	$id = $_SESSION['id'];

	if(empty($id_cliente) || empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($curp) || empty($edad) || empty($metodo_de_pago) || empty($domicilio)) {
		echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$resultado = mysqli_query($mysqli, "INSERT INTO cliente (id_cliente, nombre, apellidoP, apellidoM, curp, edad, metodo_de_pago, domicilio, telefono, id) VALUES ('$id_cliente', '$nombre', '$apellidoP', '$apellidoM', '$curp', '$edad', '$metodo_de_pago', '$domicilio', '$telefono', '$id')");
		
		if($resultado){
			echo "<font color='green'>Datos añadidos con éxito.</font>";
			echo "<br/><a href='ver.php'>Ver resultados</a>";
		} else {
			echo "Error en la inserción: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
