<?php
    // import the file for the database connection
    require_once 'config/database.php';

    // import the file for the user session
    require_once 'models/UserSession.model.php';

    // create a new database connection
    $connection = $database->getConnection();
    
    // validate if the user is logged in or not
    $userSession = new UserSession();

    if ($userSession->validateSession()) {
        // redirect to the home page
        header('Location: principal.php');
    }

    // include the controller for the login
    include_once 'controllers/login.controller.php';

    // this variable is used to set the page title
    $viewTitle = 'Login';
    
    // include the view
    include_once 'views/login.view.php';

    // close the database connection
    // $database->close();

?>