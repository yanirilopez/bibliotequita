<?php
/**
 * Guardar un nuevo libro (Sistema de Control de Biblioteca)
 *
 * Recibe por POST los datos del formulario "Registrar Nuevo Libro"
 * (título, autor e ISBN) y los guarda como un registro nuevo en la tabla
 * "libros" de la base de datos. Al terminar, redirige a index.php.
 *
 * Se ejecuta cuando el usuario presiona el botón "Guardar Libro".
 *
 * @author  Liz Yaniri Lopez Martinez
 *
 * @param string $_POST['titulo'] Título del libro
 * @param string $_POST['autor']  Autor del libro
 * @param string $_POST['isbn']   Código ISBN del libro
 * @return void Redirige a index.php; no devuelve ningún valor
 */

/**
 * Se verifica que la petición sea de tipo POST, es decir, que los datos
 * vengan del formulario. Si no es así, no se ejecuta nada.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /**
     * Datos de conexión a la base de datos MySQL de AwardSpace.
     * $host es el servidor, $usuario y $password son las credenciales y
     * $baseDatos es el nombre de la base de datos.
     */
    $host = "fdb1029.awardspace.net"; // Mismos datos de conexión
    $usuario = "4794847_pruebadb";
    $password = "cherami64";
    $baseDatos = "4794847_pruebadb";

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
     * Se limpian los datos recibidos con real_escape_string() para evitar
     * inyecciones SQL básicas. $titulo, $autor e $isbn guardan los datos
     * del libro ya limpios.
     */
    // Limpiar variables para evitar inyecciones SQL básicas
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $autor = $conexion->real_escape_string($_POST['autor']);
    $isbn = $conexion->real_escape_string($_POST['isbn']);

    /**
     * Consulta SQL que inserta el nuevo libro en la tabla "libros".
     */
    $sql = "INSERT INTO libros (titulo, autor, isbn) "
        . "VALUES ('$titulo', '$autor', '$isbn')";

    /**
     * Se ejecuta la consulta. Si el libro se guarda correctamente, se
     * regresa a index.php con el parámetro success=1; si no, se muestra
     * el error.
     */
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar a la página principal si se guardó con éxito
        header("Location: index.php?success=1");
    } else {
        echo "Error al guardar el libro: " . $conexion->error;
    }

    // Se cierra la conexión con la base de datos
    $conexion->close();
}
?>
