/**
 * Validaciones del formulario (Sistema de Control de Biblioteca)
 *
 * Revisa los datos del formulario "Registrar Nuevo Libro" antes de enviarlos
 * al servidor (guardar.php). Si falta algún campo o el ISBN es muy corto,
 * detiene el envío y muestra una alerta. Además, avisa al usuario cuando el
 * libro se registró con éxito.
 *
 * @author  Liz Yaniri Lopez Martinez
 */

/**
 * Se ejecuta cuando la página termina de cargar. Aquí se conectan todas las
 * validaciones. $form no se usa: la constante form guarda el formulario con
 * el id "formLibro".
 *
 * @return void No devuelve ningún valor
 */
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formLibro');

    /**
     * Validación que se ejecuta cuando el usuario presiona "Guardar Libro".
     * titulo, autor e isbn guardan lo que escribió el usuario, sin espacios
     * al inicio ni al final.
     *
     * @param {Event} e Evento "submit" del formulario
     * @return void No devuelve ningún valor
     */
    // Validación interactiva antes de enviar los datos al servidor
    form.addEventListener('submit', (e) => {
        const titulo = document.getElementById('titulo').value.trim();
        const autor = document.getElementById('autor').value.trim();
        const isbn = document.getElementById('isbn').value.trim();

        // Si algún campo está vacío, no se envía el formulario
        if (titulo === "" || autor === "" || isbn === "") {
            e.preventDefault(); // Detiene el envío del formulario
            alert('Por favor, rellena todos los campos antes de guardar.');

            return;
        }

        // Validación simple para que el formato ISBN no contenga
        // caracteres extraños
        if (isbn.length < 10) {
            e.preventDefault();
            alert('El campo ISBN parece demasiado corto o inválido.');
        }
    });

    /**
     * Revisa la URL para saber si el libro se guardó con éxito. Cuando
     * guardar.php redirige con success=1, se limpia la URL y se muestra un
     * mensaje de confirmación. urlParams guarda los parámetros de la URL.
     */
    // Detectar si venimos de un registro exitoso mediante la URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1') {
        // Limpiar el parámetro de la URL estética
        window.history.replaceState(
            {},
            document.title,
            window.location.pathname
        );
        alert('¡Libro registrado con éxito en el inventario!');
    }
});
