<?php

if (isset($_FILES['file'])){
    $file = $_FILES['file'];
    $filename = $file['name'];
    $nimetype = $file['type'];
    $allowed_types = array("image/jpg", "image/jpeg", "image/png");
    if (!in_array($nimetype, $allowed_types)){
        header("location:index.php");
    }
    if(!is_dir("logotipos")){
        mkdir("logotipos", 0777);

    }

    move_uploaded_file($file['tmp_name'], 'logotipos'."/".$filename);
}
?>