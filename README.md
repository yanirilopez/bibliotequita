
## Algunos temas que vimos

- Git init
- Git status
- Git add .
- Git commit -m
- Git push

## ¿De qué trata mi proyecto?

Este proyecto es una página web para llevar el control de los libros de una
biblioteca. Con ella puedo registrar libros nuevos, ver el inventario completo
y marcar cuando un libro se presta o se devuelve. Lo hice con PHP, MySQL, HTML,
CSS y JavaScript, y lo publiqué en AwardSpace.

## Herramientas que usé

- Visual Studio Code para escribir el código
- AwardSpace para alojar la página y la base de datos
- phpMyAdmin para crear la tabla
- Git y GitHub para guardar y subir mis archivos


## Archivos que creé

Dentro de la carpeta de mi proyecto hice estos cinco archivos:

```
Biblioteca/
├── index.php
├── guardar.php
├── cambiarEstado.php
├── style.css
└── script.js
```

| Archivo | Qué hace |
| --- | --- |
| index.php | Muestra el formulario y la tabla con los libros |
| guardar.php | Guarda en la base de datos el libro que escribo en el formulario |
| cambiarEstado.php | Cambia el libro entre Disponible y Prestado |
| style.css | Le da color y orden a la página |
| script.js | Revisa que no falten datos antes de guardar |


### Paso 1: Crear la base de datos

1. Entré a mi cuenta de AwardSpace.
2. Abrí el apartado **Database Manager**.
3. Creé una base de datos nueva
4. Anoté los cuatro datos que me dieron: servidor, usuario, contraseña y nombre
   de la base de datos. Los necesité más adelante para conectar mis archivos PHP.

### Paso 2: Crear la tabla


Abrí **phpMyAdmin**, elegí mi base de datos, entré a la pestaña **SQL** y
ejecuté este código para crear la tabla `libros`:

```sql
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    disponible INT DEFAULT 1
);
```

La columna `disponible` vale 1 cuando el libro está disponible y 0 cuando está
prestado.

### Paso 3: Agregar los dos primeros libros

Para tener datos con los que probar, en la misma pestaña SQL agregué dos libros:

```sql
INSERT INTO libros (titulo, autor, isbn, disponible) VALUES
('Cien años de soledad', 'Gabriel García Márquez', '978-0307474728', 1),
('Don Quijote de la Mancha', 'Miguel de Cervantes', '978-8424937461', 1);
```

Luego ejecuté esta consulta para comprobar que se guardaron:

```sql
SELECT * FROM libros;
```

### Paso 4: Escribir el código de cada archivo

En todos los archivos PHP tuve que cambiar los datos de conexión por los que me
dio AwardSpace: servidor, usuario, contraseña y nombre de la base de datos.
 ```php
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
```
### guardar.php

Este codigo sirve para que reciba lo que escribo en el formulario y lo guarde en la tabla.

### cambiarEstado.php

Este se ejecuta cuando presiono el botón Prestar o Devolver en la tabla y cambia el estado del libro.

### style.css

Con el style le di formato a la página entera para que tenga una buena presentación.

### script.js

Este archivo revisa el formulario antes de enviarlo y avisa cuando el libro se
guardó bien.


### Paso 5: Probar que todo funciona

1. Abrí mi página y revisé que aparecieran los dos libros del Paso 3.
2. Registré un libro nuevo con el formulario.
3. Presioné el botón **Prestar** y el estado cambió a Prestado.
4. Presioné **Devolver** y volvió a Disponible.
   
<img width="1179" height="616" alt="image" src="https://github.com/user-attachments/assets/e2126b8b-b97a-45b3-844c-1a380bacf98b" />

### Paso 6: Subir los archivos a GitHub

Subí mis archivos a GitHub uno por uno. Cada uno lleva el comentario
"Primera subida de archivos".

Primero preparé el repositorio:

```bash
git init
```

```bash
git branch -M main
```

```bash
git remote add origin https://github.com/TU_USUARIO/TU_REPOSITORIO.git
```

```bash
git status
```

Después agregué cada archivo con su commit:

```bash
git add index.php
git commit -m "Primera subida de archivos - index.php"
```

```bash
git add guardar.php
git commit -m "Primera subida de archivos - guardar.php"
```

```bash
git add cambiarEstado.php
git commit -m "Primera subida de archivos - cambiarEstado.php"
```

```bash
git add style.css
git commit -m "Primera subida de archivos - style.css"
```

```bash
git add script.js
git commit -m "Primera subida de archivos - script.js"
```

```bash
git add README.md
git commit -m "Primera subida de archivos - README.md"
```

Por último revisé que no quedara nada pendiente y subí todo:

```bash
git status
```

```bash
git push -u origin main
```

