<?php

    // import the file for the userSession
    require_once 'models/UserSession.model.php';

    // validate if the user is logged in or not
    $userSession = new UserSession();

    if (!$userSession->validateSession()) {
        // redirect to the home page
        header('Location: index.php');
    }

    // this variable is used to set the page title
    $viewTitle = 'Pantalla principal';

    // include the view for the page
    require_once 'views/principal.view.php';

?>