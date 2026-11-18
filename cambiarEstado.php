<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) &&
isset($_POST['actual'])) {
$host = "pdbXX.awardspace.net"; // Reemplaza por tus datos de AwardSpace
$usuario = "tu_usuario_bd";
$password = "tu_password_bd";
$base_datos = "tu_nombre_bd";
$conexion = new mysqli($host, $usuario, $password, $base_datos);
if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}
$id = intval($_POST['id']);
$estado_actual = intval($_POST['actual']);
// Si estaba disponible (1), ahora será prestado (0). Si estaba prestado (0), será disponible (1).
$nuevo_estado = ($estado_actual === 1) ? 0 : 1;

$sql = "UPDATE libros SET disponible = $nuevo_estado WHERE id = $id";
if ($conexion->query($sql) === TRUE) {
// Redirecciona de vuelta con un parámetro de éxito de actualización
header("Location: index.php?updated=1");
} else {
echo "Error al actualizar el estado: " . $conexion->error;
}
$conexion->close();
} else {
header("Location: index.php");
}
?>