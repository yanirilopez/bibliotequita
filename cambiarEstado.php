<?php
/**
 * Actualizar estado de un libro (Sistema de Control de Biblioteca)
 *
 * Recibe por POST el ID de un libro y su estado actual de disponibilidad.
 * Cambia el estado en la base de datos: si el libro estaba disponible pasa
 * a prestado, y si estaba prestado pasa a disponible. Al terminar, redirige
 * a index.php.
 *
 * Se ejecuta cuando el usuario presiona el botón "Prestar" de la tabla
 * "Inventario de Libros".
 *
 * @author  Liz Yaniri Lopez Martinez
 *
 * @param int $_POST['id']     ID del libro que se va a actualizar
 * @param int $_POST['actual'] Estado actual (1 = disponible, 0 = prestado)
 * @return void Redirige a index.php; no devuelve ningún valor
 */

/**
 * Se verifica que la petición sea de tipo POST y que lleguen los datos
 * "id" y "actual". Si falta alguno, se redirige a index.php (bloque else).
 */
if (
    $_SERVER["REQUEST_METHOD"] == "POST"
    && isset($_POST['id'])
    && isset($_POST['actual'])
) {
    /**
     * Datos de conexión a la base de datos MySQL de AwardSpace.
     * $host es el servidor, $usuario y $password son las credenciales y
     * $baseDatos es el nombre de la base de datos.
     */
    $host = "pdbXX.awardspace.net"; // Reemplaza por tus datos de AwardSpace
    $usuario = "tu_usuario_bd";
    $password = "tu_password_bd";
    $baseDatos = "tu_nombre_bd";

    /**
     * Conexión a la base de datos usando la extensión MySQLi.
     * $conexion es el objeto de conexión con MySQL.
     */
    $conexion = new mysqli($host, $usuario, $password, $baseDatos);

    /**
     * Si la conexión falla, se detiene el programa y se muestra el error.
     */
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    /**
     * Se convierten a número entero los datos recibidos por POST.
     * Esto ayuda a evitar que se envíen valores no válidos.
     * $id es el ID del libro y $estadoActual su estado actual
     * (1 = disponible, 0 = prestado).
     */
    $id = intval($_POST['id']);
    $estadoActual = intval($_POST['actual']);

    /**
     * Se calcula el nuevo estado del libro (se invierte el valor actual).
     * $nuevoEstado vale 0 si estaba disponible (ahora prestado) y 1 si
     * estaba prestado (ahora disponible).
     */
    // Si estaba disponible (1), ahora será prestado (0).
    // Si estaba prestado (0), será disponible (1).
    $nuevoEstado = ($estadoActual === 1) ? 0 : 1;

    /**
     * Consulta SQL que actualiza la columna "disponible" del libro
     * indicado en la tabla "libros".
     */
    $sql = "UPDATE libros SET disponible = $nuevoEstado WHERE id = $id";

    /**
     * Se ejecuta la consulta. Si se actualiza correctamente, se regresa a
     * index.php con el parámetro updated=1; si no, se muestra el error.
     */
    if ($conexion->query($sql) === TRUE) {
        // Redirecciona de vuelta con un parámetro de éxito de actualización
        header("Location: index.php?updated=1");
    } else {
        echo "Error al actualizar el estado: " . $conexion->error;
    }

    // Se cierra la conexión con la base de datos
    $conexion->close();
} else {
    header("Location: index.php");
}
?>
