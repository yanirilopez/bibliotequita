<?php
// Cambia estos datos con los que te proporcione AwardSpace en tu "DatabaseManager"
$host = "fdb1029.awardspace.net"; // Reemplaza XX por el número de tu servidor
$usuario = "4794847_pruebadb";
$password = "cherami64";
$base_datos = "4794847_pruebadb";
$conexion = new mysqli($host, $usuario, $password, $base_datos);
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}
// Obtener los libros existentes
$resultado = $conexion->query("SELECT * FROM libros ORDER BY id
  DESC");
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Control de Biblioteca</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1> Sistema de Control de Biblioteca</h1>
</header>
<main class="container">
<!-- Formulario para agregar libros -->
<section class="card">
<h2>Registrar Nuevo Libro</h2>
<form id="formLibro" action="guardar.php" method="POST">
<div class="form-group">
<label for="titulo">Título del Libro:</label>
<input type="text" id="titulo" name="titulo" required>
</div>
<div class="form-group">
<label for="autor">Autor:</label>
<input type="text" id="autor" name="autor" required>
</div>
<div class="form-group">
<label for="isbn">ISBN:</label>
<input type="text" id="isbn" name="isbn" required>
</div>
<button type="submit" class="btn">Guardar Libro</button>
</form>
</section>
<!-- Tabla de libros en la Base de Datos -->
<!-- Tabla de libros en la Base de Datos -->
<section class="card table-container">
<h2>Inventario de Libros</h2>
<table id="tablaLibros">
<thead>
<tr>
<th>ID</th>
<th>Título</th>
<th>Autor</th>
<th>ISBN</th>
<th>Estado</th>
<th>Acción</th> <!-- Nueva columna -->
</tr>
</thead>
<tbody>
<?php if ($resultado->num_rows > 0): ?>
<?php while($fila = $resultado->fetch_assoc()): ?>
<tr>
<td><?php echo $fila['id']; ?></td>
<td><strong><?php echo htmlspecialchars($fila['titulo']);
?></strong></td>
<td><?php echo htmlspecialchars($fila['autor']); ?></td>
<td><?php echo htmlspecialchars($fila['isbn']); ?></td>
<td>
<span class="badge <?php echo $fila['disponible'] ? 'dispo' :
'prestado'; ?>">
<?php echo $fila['disponible'] ? 'Disponible' : 'Prestado'; ?>
</span>
</td>
<td>

<!-- Formulario que envía el ID y el estado actual al script de
actualización -->
<form action="cambiarEstado.php" method="POST"
style="margin:0;">
<input type="hidden" name="id" value="<?php echo $fila['id'];
?>">
<input type="hidden" name="actual" value="<?php echo
$fila['disponible']; ?>">
<button type="submit" class="btn-action <?php echo
$fila['disponible'] ? 'btn-prestar' : 'btn-devolver'; ?>">
<?php echo $fila['disponible'] ? 'Prestar' : 'Devolver'; ?>
</button>
</form>
</td>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="6" style="text-align: center;">No hay libros
registrados.</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</section>
</main>
<script src="script.js"></script>
</body>
</html>
<?php $conexion->close(); ?>
