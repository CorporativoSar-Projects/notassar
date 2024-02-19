<?php

    // import the file for the database connection
    require_once 'config/database.php';

    // import the file for the user session
    require_once 'models/UserSession.model.php';

    // create a new database connection
    $connection = $database->getConnection();
    
    // validate if the user is logged in or not
    $userSession = new UserSession();

    if (!$userSession->validateSession()) {
        // redirect to the home page
        header('Location: index.php');
    }

?>