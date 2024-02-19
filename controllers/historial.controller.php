<?php
// import the model for the notes
require_once 'models/Note.model.php';

// query to get the notes from the database
$query = "SELECT n.*, ton.*, c.* FROM notes n, user_notes un, typesofnotes ton, note_type nt, clients c, client_notes cn
         WHERE n.NO_Id = un.UN_NO_Id AND un.UN_US_Id = :id_usuario
         AND n.NO_Id = cn.CN_NO_Id AND cn.CN_CL_Id = c.CL_Id
         AND n.NO_Id = nt.NT_NO_Id AND ton.TN_Id = nt.NT_TY_Id";

// prepare the query
$stmt = $connection->prepare($query);

// id of the user
$id_usuario = $userSession->getUser()->getId();

echo $id_usuario;

// bind the parameters
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

// execute the query
$stmt->execute();

// get the result
$result = $stmt->fetchAll();

// create an array to store the notes
$notes = array();

// iterate over the result
foreach ($result as $row) {
    // create a note object
    $note = new Note(
        $row['NO_Id'],
        $row['NO_Folio'],
        $row['NO_Subtotal'],
        $row['NO_Register_Date'],
        $row['NO_Init_Date'],
        $row['NO_End_Date'],
        $row['NO_Iva'],
        $row['NO_Total'],
        $id_usuario,
        new Client(
            $row['CL_Id'],
            $row['CL_Name'],
            $row['CL_Email'],
            $row['CL_Address'],
            $row['CL_Number']
        ),
        $row['TN_Name'],
        null
    );

    // add the note to the array
    array_push($notes, $note);
}

?>