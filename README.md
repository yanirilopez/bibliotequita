
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
3. ya tenia creada una base de datos, asi que solo agregue una tabla que se llama **libros**
4. Anoté los cuatro datos que me dieron: servidor, usuario, contraseña y nombre
   de la base de datos. Los necesité más adelante para conectar mis archivos PHP.
