# notassar
Sistema de contabilidad y mkt

# Configurar la base de datos

1. En el gestor de base de datos de su preferencia, se debe de importar el siguiente archivo que se encuentra en la ruta

```
    notassar/db/db.sql

    en este archivo se encontrara el script para la importacion de la base
    de datos.
```

2. despues de importarlo, se añadira la base de datos "notasinnsoldb", ahora lo que sigue es ingresar los datos de prueba a la base de datos, los cuales se encuentran en la siguiente ruta:

```
    notassar/db/sql_insercion_datos.sql

    aqui se encuentran los datos de prueba.
```

3. El proyecto para funcionar se debe de configurar para el entorno de desarrollo, por lo que iremos al archivo de connecion y modificaremos las credenciales:

```
    notassar/config/database.php
```

4. en este archivo se encuentran las varianbles que debemos cambiar para el entorno de desarrollo de cada programador:

```PHP
    // Usage:
    $host = ""; // nombre del host
    $dbname = ""; // nombre de la base de datos
    $username = ""; // nombre del superusuario o usuario
    $password = ""; // contraseña asociada al usuario
```

algunos ejemplos se muestran a continuacion

```PHP
    // Database credentials for localhost
    $host = "localhost";
    $dbname = "notasinnsoldb";
    $username = "root";
    $password = "";
```


# Datos para ingresar al sistema en desarrollo

<!-- tabla se usuarios -->
|         Email                |  Contraseña   |
|------------------------------|---------------|
| juan.perez@example.com       | contrasena123 |
| maria.lopez@example.com      | password456   |
| carlos.rodriguez@example.com | securepass789 |


# Estructura de los commits

example 
```
    Accion: tipo de cambio - descripcion
    File: update - actualizacion del archivo css/style.css para la clase del boton

    *** la nomenglatura para los commits pueden ser en ingles o español ***
```

|  Accion         |   tipo de cambio            |   descripcion |
|-----------------|-----------------------------|---------------|
|    file         |    update / actualizacion   |   actualizacion de un archivo     |
|    file         |    delete / eliminacion     |   eliminacion de un archivo       |
|    file         |    create / creacion        |   creacion de un archivo          |
|    estructure   |    update / actualizacion   |   actualizacion de la estructura en las carpetas  |
|    estructure   |    delete / eliminacion     |   eliminacion de una carpeta      |
|    estructure   |    create / creacion        |   creacion de una nueva carpeta   |
|    database     |    update / actualizacion   |   actualizacion de los scripts    |
|    database     |    create / creacion        |   creacion de nuevos scripts      |
|    readme       |    update / actualizacion   |   actualizar el archivo readme    |


# Descripcion de las carpetas

