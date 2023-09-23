<?php
//SE debe jalar el codigo de la empresa para crear la carpeta donde ir'a su logo, debe ser una varibale 
//global que venga de registro empresarial, para sustituir en "logotipos"

include 'conexion.php';
$nomEmp =$_POST['nomEmp'];
$codigoEmp =$_POST['codigoEmp'];
$nomRep =$_POST['nomRep'];
$CorreoE =$_POST['CorreoE'];
$telCont =$_POST['telCont'];
$sitWeb =$_POST['sitWeb'];
$dirEmp =$_POST['dirEmp'];
$temaEmp =$_POST['temaEmp'];

    if (isset($_FILES['file'])){
        $file = $_FILES['file'];
        $filename = $file['name'];
        $nimetype = $file['type'];
        $allowed_types = array("image/jpg", "image/jpeg", "image/png");
        if (!in_array($nimetype, $allowed_types)){
             header("location:index.php");
        }
        if(!is_dir("$codigoEmp")){
            mkdir("$codigoEmp", 0777);
           echo $codigoEmp;

        }
        move_uploaded_file($file['tmp_name'], $codigoEmp."/".$filename);
        rename( $codigoEmp."/".$filename, $codigoEmp."/"."logo.png");
        $queU="INSERT INTO EmpresaC values ('$nomEmp', '$codigoEmp', '$temaEmp', '$CorreoE', '$nomRep', ' ', '$sitWeb', '$telCont', '$dirEmp');" ;
        if ($conexion->query($queU)) {
		echo "<script>alert('DATOS GUARDADOS CORRECTAMENTE. GENERA EL PDF Y PUEDES GENERAR UNA NUEVA NOTA.');</script>";
	    }
	    else{
		echo "Error al actualizar los datos, verifica los datos e inténtalo de nuevo.".mysqli_error($conexion);
		header('Location: registroEmpresarial.php');
	    }
    }
    else{
    	echo "<script>alert('No hay archivo, comunicate con soporte');</script>";
    }

?>