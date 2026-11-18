<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$host = "fdb1029.awardspace.net"; // Mismos datos de conexión
$usuario = "4794847_pruebadb";
$password = "cherami64";
$base_datos = "4794847_pruebadb";
$conexion = new mysqli($host, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}
// Limpiar variables para evitar inyecciones SQL básicas
$titulo = $conexion->real_escape_string($_POST['titulo']);
$autor = $conexion->real_escape_string($_POST['autor']);
$isbn = $conexion->real_escape_string($_POST['isbn']);
$sql = "INSERT INTO libros (titulo, autor, isbn) VALUES ('$titulo', '$autor',
'$isbn')";
if ($conexion->query($sql) === TRUE) {
// Redireccionar de vuelta a la página principal si se guardó con éxito
header("Location: index.php?success=1");
} else {
echo "Error al guardar el libro: " . $conexion->error;
}
$conexion->close();
}
?>
