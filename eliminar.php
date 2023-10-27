<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include("conexion.php");

$id_cliente = $_GET['id_cliente'];

$resultado = mysqli_query($mysqli, "DELETE FROM cliente WHERE id_cliente=$id_cliente");

header("Location:ver.php");
?>