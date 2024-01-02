<?php
require_once 'config/database.php';
// Se importa el modelo de usuario sesion
require_once 'models/UserSession.model.php';
//Importar el archivo de modelos para controlador
require_once 'controllers/notes.controller.php';
require_once 'models/Notes.model.php';
// Se crea una conexion a base de datos
$userSession = new UserSession();
$userSession->getDataSession();
$Notes = new Notes();
$Notes = unserialize($_SESSION['Nota']);
$compania = $userSession->getCompany()->getId();
    error_reporting(0);
	echo "Usuario: ".$_SESSION['$user'];
	$COD=$_SESSION['$CodiEmp'];
	$nameL="Cuauhtémoc, Ciudad de México";
	$ign=$_POST['firma'];
	$correU=$_SESSION['$user'];
	$nomCliente=$Notes->getName();
	$domCliente=$Notes->getDirection();
	$corrCliente=$Notes->getEmail();
	$telefono=$Notes->getPhone();
	$fechaR=date('Y-m-d H:i:s');
	$fechaI=$Notes->getInitDate();
	$fechaT=$Notes->getEndDate();	
	$idservicio=$_POST['idservicio'];
	$idservicio2=$_POST['idservicio2'];
	$idservicio3=$_POST['idservicio3'];
	$idservicio4=$_POST['idservicio4'];
	$cantidad=intval($_POST['cantidad']);
	$cantidad2=intval($_POST['cantidad2']);
	$cantidad3=intval($_POST['cantidad3']);
	$cantidad4=intval($_POST['cantidad4']);
	$descripcion=$_POST['descripcion'];
	$descripcion2=$_POST['descripcion2'];
	$descripcion3=$_POST['descripcion3'];
	$descripcion4=$_POST['descripcion4'];
	$precio=$_POST['precio'];
	$precio2=$_POST['precio2'];
	$precio3=$_POST['precio3'];
	$precio4=$_POST['precio4'];
	$importe=$_POST['importe'];
	$importe2=$_POST['importe2'];
	$importe3=$_POST['importe3'];
	$importe4=$_POST['importe4'];
	$tipoNota=$_POST['tipoNota'];
	$folio=$Notes->getFolio();
	$fecha=$_POST['fecha'];
	$subtotal=$_POST['subtotal'];
	$subtotal=number_format($subtotal,2);
	$iva=$_POST['iva'];
	$iva=number_format($iva,2);
	$riva=$_POST['retiva'];
	$riva=number_format($riva,2);
	$risr=$_POST['isr'];
	$risr=number_format($risr,2);
	$total=$_POST['total'];
	$total=number_format($total,2);
	$tema = $_SESSION['$Tema'];
	/*$riva=number_format($riva,2);*/
	if ($precio=='') {
		$precio=0;
	}
	if ($precio2=='') {
		$precio2=0;
	}
	if ($precio3=='') {
		$precio3=0;
	}
	if ($precio4=='') {
		$precio4=0;
	}
	if ($descripcion=='') {
		$descripcion="-";
	}
	if ($descripcion2=='') {
		$descripcion2="-";
	}
	if ($descripcion3=='') {
		$descripcion3="-";
	}
	if ($descripcion4=='') {
		$descripcion4="-";
	}	
    $connection = $database->getConnection();
    $queryData = "SELECT PR_Id, PR_Name, PR_Price FROM products p, company_products cp WHERE p.PR_Id =  cp.CP_PR_Id AND CP_CO_Id = '$compania';";
    $stmtData = $connection->prepare($queryData);
    $stmt->execute();

	$querprp = "INSERT INTO ProspectosS	VALUES ('$correU','$nomCliente','$telefono','domCliente','8','$corrCliente','Cliente');";
	//Por default el cliente de notas tendra estado "8", y tipo, "cliente".
	$conexion->query($querprp);
	$queU="INSERT INTO NotasS (CodigoE, IDCliente, ID_Us,
	FOLIO, Nomser, Cantidad, precio, importe,
	Nomser2, Cantidad2, precio2, importe2,
	Nomser3, Cantidad3, precio3, importe3,
	Nomser4, Cantidad4, precio4, importe4,
	subtotal, FechaRegistro, FECHAI, FECHAT,
	IVA, RIVA, ISR,Total, NombreC, TipoNota) 
	Values ('$COD','$corrCliente','$correU','$folio',
	'$descripcion','$cantidad','$precio','$importe',
	'$descripcion2','$cantidad2','$precio2','$importe2',
	'$descripcion3','$cantidad3','$precio3','$importe3',
	'$descripcion4','$cantidad4','$precio4','$importe4',
	'$subtotal','$fechaR','$fechaI','$fechaT','$iva','$riva',
	'$risr','$total','$nomCliente','$tipoNota');";
	if ($conexion->query($queU)) {
		echo "<script>alert('DATOS GUARDADOS CORRECTAMENTE. GENERA EL PDF Y PUEDES GENERAR UNA NUEVA NOTA.');</script>";
	}
	else{
		echo "Error al actualizar los datos, verifica los datos e inténtalo de nuevo.".mysqli_error($conexion);
		header('Location: notas.php');
	}
	/*echo $queU;*/
?>
