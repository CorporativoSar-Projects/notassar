<?php
//SE debe jalar el codigo de la empresa para crear la carpeta donde ir'a su logo, debe ser una varibale 
//global que venga de registro empresarial, para sustituir en "logotipos"
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
        header("loaction:Imagenes.php");
    }
    if(!is_dir("$nomEmp")){
        mkdir("$nomEmp", 0777);

    } 
    move_uploaded_file($file['tmp_name'], "$nomEmp"."/".$filename);
    rename( $nomEmp."/".$filename, $nomEmp."/"."logo.png");
}

?>