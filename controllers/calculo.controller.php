<?php
 // Se importa la comfiguracion de base de datos
require_once 'config/database.php';
// Se importa el modelo de usuario sesion
require_once 'models/UserSession.model.php';
//Importar el archivo de modelos para controlador
require_once 'controllers/notes.controller.php';
require_once 'models/Notes.model.php';
// Se crea una conexion a base de datos
$userSession = new UserSession();
$userSession->getDataSession();
$compania = $userSession->getCompany()->getId();
$connection = $database->getConnection();
$queryData = "SELECT PR_Id, PR_Name, PR_Price FROM products p, company_products cp WHERE p.PR_Id =  cp.CP_PR_Id AND CP_CO_Id = '$compania';";
$stmtData = $connection->prepare($queryData);
$stmt->execute();
$rowData = $stmtData->fetch(PDO::FETCH_ASSOC);
$importe = 0.0;
$importe2 = 0.0;
$importe3 = 0.0;
$importe4 = 0.0;
$subtotal = 0.0;
$subtotal2 = 0.0;
$subtotal3 = 0.0;
$subtotal4 = 0.0;
//Se crea un nuevo modelo de usuario sesion
if (isset($_POST['dataFolio']) && isset($_POST['tipoNota'])&& isset($_POST['nomCliente'])&& isset($_POST['corrCliente'])
&& isset($_POST['telefono'])&& isset($_POST['domicilio'])&& isset($_POST['fechaI'])&& isset($_POST['fechaT'])) {
    $Notes = new Notes();
    $Notes->setFolio(filter_var($_POST['dataFolio'], FILTER_SANITIZE_STRING));
    $Notes->setName(filter_var($_POST['nomCliente'], FILTER_SANITIZE_STRING));
    $Notes->setEmail(filter_var($_POST['corrCliente'], FILTER_SANITIZE_STRING));
    $Notes->setPhone(filter_var($_POST['telefono'], FILTER_SANITIZE_STRING));
    $Notes->setDirection(filter_var($_POST['domicilio'], FILTER_SANITIZE_STRING));
    $Notes->setInitDate(filter_var($_POST['fechaI'], FILTER_SANITIZE_STRING));
    $Notes->setEndDate(filter_var($_POST['fechaT'], FILTER_SANITIZE_STRING));
    $Notes->setIva(filter_var($_POST['tipoNota'], FILTER_SANITIZE_STRING));
    $_SESSION['Nota']=serialize($Notes);
}
$cantidad = $_POST['cantidad'];
$subtotal= 0;
$precio = 0;
$nombre ='';
$idServicio = 0;
if(isset($_POST['idservicio'])&& isset($_POST['cantidad'])){
 $idServicio = $_POST['idservicio'];
 $queryPrecio = "SELECT PR_Price FROM products WHERE PR_Id = '$idServicio';";
 $stmtPrecio = $connection->prepare($query);
 $stmtPrecio->execute();
 $rowPrecio = $stmtPrecio->fetch(PDO::FETCH_ASSOC);
 $queryNombre = "SELECT PR_Name FROM products WHERE PR_Id = '$idServicio';";
 $stmtNombre = $connection->prepare($query);
 $stmtNombre->execute();
 $rowNombre = $stmtPrecio->fetch(PDO::FETCH_ASSOC);
 $nombre = trim($rowPrecio['PR_Name']);
 $precio = trim($rowPrecio['PR_Price']);
    $importe= $_POST['cantidad']*$precio;
    $subtotal +=$importe; 
}
$cantidad2 = $_POST['cantidad2'];
$subtotal2= 0;
$precio2 = 0;
$nombre2 ='';
$idServicio2 = 0;
if(!isset($_POST['idservicio2'])&& !isset($_POST['cantidad2'])){
 $idServicio2 = $_POST['idservicio2'];
 $queryPrecio = "SELECT PR_Price FROM products WHERE PR_Id = '$idServicio';";
 $stmtPrecio = $connection->prepare($query);
 $stmtPrecio->execute();
 $rowPrecio = $stmtPrecio->fetch(PDO::FETCH_ASSOC);
 $queryNombre = "SELECT PR_Name FROM products WHERE PR_Id = '$idServicio';";
 $stmtNombre = $connection->prepare($query);
 $stmtNombre->execute();
 $rowNombre = $stmtPrecio->fetch(PDO::FETCH_ASSOC);
 $nombre2 = trim($rowPrecio['PR_Name']);
 $precio2 = trim($rowPrecio['PR_Price']);
 $importe2= $_POST['cantidad2']*$precio;
    $subtotal2 +=$importe2;
}
$cantidad3 = $_POST['cantidad3'];
$subtotal3= 0;
$precio3 = 0;
$nombre3 ='';
$idServicio3 = 0;
if(!isset($_POST['idservicio3'])&& !isset($_POST['cantidad3'])){
 $idServicio3 = $_POST['idservicio3'];
 $queryPrecio = "SELECT PR_Price FROM products WHERE PR_Id = '$idServicio';";
 $stmtPrecio = $connection->prepare($query);
 $stmtPrecio->execute();
 $rowPrecio = $stmtPrecio->fetch(PDO::FETCH_ASSOC);
 $queryNombre = "SELECT PR_Name FROM products WHERE PR_Id = '$idServicio';";
 $stmtNombre = $connection->prepare($query);
 $stmtNombre->execute();
 $rowNombre = $stmtPrecio->fetch(PDO::FETCH_ASSOC);
 $nombre3 = trim($rowPrecio['PR_Name']);
 $precio3 = trim($rowPrecio['PR_Price']);
    $importe3= $_POST['cantidad3']*$precio;
    $subtotal3 +=$importe3;
}
$cantidad4 = $_POST['cantidad4'];
$subtotal4= 0;
$precio4 = 0;
$nombre4 ='';
$idServicio4 = 0;
if(!isset($_POST['idservicio4'])&& !isset($_POST['cantidad4'])){
    $idServicio4 = $_POST['idservicio4'];
 $queryPrecio = "SELECT PR_Price FROM products WHERE PR_Id = '$idServicio';";
 $stmtPrecio = $connection->prepare($query);
 $stmtPrecio->execute();
 $rowPrecio = $stmtPrecio->fetch(PDO::FETCH_ASSOC);
 $queryNombre = "SELECT PR_Name FROM products WHERE PR_Id = '$idServicio';";
 $stmtNombre = $connection->prepare($query);
 $stmtNombre->execute();
 $rowNombre = $stmtPrecio->fetch(PDO::FETCH_ASSOC);
 $nombre4 = trim($rowPrecio['PR_Name']);
 $precio4 = trim($rowPrecio['PR_Price']);
    $importe4= $_POST['cantidad4']*$precio;
    $subtotal4 +=$importe4;
}
$folio =  $Notes->getFolio(); 
$nombreCli = mb_strtoupper($Notes->getName(), 'UTF-8');
$correo = $Notes->getEmail();
$telefono = $Notes->getPhone();
$domicilio = $Notes->getDirection();
$fechaI = $Notes->getInitDate();
$fechaT = $Notes->getEndDate();
$mes=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
$m=$mes[date('m')-1];
$hoy = date("d")." de ".$m." de ".date("Y"); print_r($hoy);
?>