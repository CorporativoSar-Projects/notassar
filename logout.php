<?php

    // Destroy the session
    // import the class userSession
    require_once 'models/userSession.model.php';
    // create a new instance of the class userSession
    $userSession = new UserSession();
    // validate if the user is logged in
    if ($userSession->validateSession()) {
        // destroy the session
        $userSession->logout();
        // redirect to the login page
        header('location: index.php');
    }

?>