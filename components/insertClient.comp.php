<?php

// query to insert the client
$query = "INSERT INTO clients (CL_Name, CL_Email, CL_Address, CL_Number) VALUES (:name, :email, :address, :number);";

// prepare the query
$stmt = $connection->prepare($query);

// bind the parameters
$name = $client->getName();
$email = $client->getEmail();
$address = $client->getAddress();
$number = $client->getNumber();

$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':number', $number);

// execute the query
$stmt->execute();

// get the id of the client
if ($stmt->rowCount() > 0) {
    $clientId = $connection->lastInsertId();
} else {
    $clientId = null;
}

?>