
<?php 

    // Database credentials for localhost
    // $host = "localhost";
    // $dbname = "notasinnsoldb";
    // $username = "root";
    // $password = "";

    // Database credentials for production
    // $host = "localhost";
    // $dbname = "corpo240_InnsolNotas";
    // $username = "corpo240_admin";
    // $password = 'INNSOL"="#()';

    // Usage:
    $host = "localhost";
    $dbname = "notasinnsoldb";
    $username = "root";
    $password = "";

    include_once 'models/Database.model.php';

    $database = new DatabaseConnection($host, $dbname, $username, $password);
    $database->connect();

?>
