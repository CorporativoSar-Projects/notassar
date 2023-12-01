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

|  Accion         |   tipo de cambio                              |   descripcion |
|-----------------|-----------------------------------------------|---------------|
|    file         |    update / actualizacion                     |   actualizacion de un archivo     |
|    file         |    delete / eliminacion                       |   eliminacion de un archivo       |
|    file         |    create / creacion                          |   creacion de un archivo          |
|    estructure   |    update / actualizacion                     |   actualizacion de la estructura  |
|    estructure   |    delete / eliminacion                       |   eliminacion de una carpeta      |
|    estructure   |    create / creacion                          |   creacion de una nueva carpeta   |
|    estructure   |    file location / locacion de archivo        |   creacion de una nueva carpeta   |
|    database     |    update / actualizacion                     |   actualizacion de los scripts    |
|    database     |    create / creacion                          |   creacion de nuevos scripts      |
|    readme       |    update / actualizacion                     |   actualizar el archivo readme    |


# Uso de los datos de la sesion

### Obtencion de los datos de la sesion

Al momento de crear una instancia de la clase UserSession

```PHP
    $userSession = new UserSession();
```


la instancia creada tiene los metodos a los que podemos acceder

1. startSession

Esta funcion inicia la sesion del usuario en PHP

2. validateSession

Funcion que valida si el usuario ha iniciado sesion previamente y los guarda en la instancia de la clase, esta funcion regresa un dato booleano por lo que podemos hacer lo siguiente
```PHP

    // validar la sesion
    $userSession->validateSession()

    // redireccionar si ya inicio sesion
    if ($userSession->validateSession()) {
        // redirect to the home page
        header('Location: principal.php');
    }
```

3. login

Esta funcion se utiliza cuando para guardar los datos en la sesion al momento de iniciar sesion en el sistema la cual recibe un arreglo de datos 

```PHP
    // set the data in session
    public function login($data) {
        // create the user object
        $user = new User($data);

        // create the company object
        $company = new Company($data['CO_Id']);

        // set the data in UserSession
        $this->user = $user;
        $this->isLoggedIn = true;
        $this->company = $company;
    }
```

4. getDataSession
5. logout
6. setters y getters


### Obtener los datos del Usuario

```PHP
    $userSession->getUser();

    // obtener el id
    $userSession->getUser()->getId();

    // obtener el nombre
    $userSession->getUser()->getFullName();

    // obtener el correo
    $userSession->getUser()->getEmail();

    // Obtener el tipo de usuario
    $userSession->getUser()->getTypeOfUser();

    // Obtener el nombre del tipo de usuario
    $userSession->getUser()->getTypeOfUserName();

    // Obtener su descripcion
    $userSession->getUser()->getTypeOfUserDescription();
```

### Obtener los datos de la compañia

```PHP
    $userSession->getCompany();

    //id
    $userSession->getCompany()->getId();

    //email
    $userSession->getCompany()->getEmail();

    // nombre
    $userSession->getCompany()->getName();

    // codigo
    $userSession->getCompany()->getCode();

    // direccion
    $userSession->getCompany()->getAddress();

    // telephono
    $userSession->getCompany()->getPhone();

    // logo
    $userSession->getCompany()->getLogo();

    // sitio web
    $userSession->getCompany()->getWebsite();

    // tema
    $userSession->getCompany()->getTheme();

    // productos
    $userSession->getCompany()->getProducts();

    // etiquetas
    $userSession->getCompany()->getLabels();


```


