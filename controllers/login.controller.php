<?php
    // get the data from the form if the form was submitted
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // get the data from the form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // sanitize the data
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        // encrypt the password with SHA256
        $password = hash('sha256', $password);

        // create the query
        $query = "SELECT u.US_Id, u.US_Email, CONCAT( u.US_Name, ' ', u.US_Pat_Sur, ' ', u.US_Mat_Sur ) AS 'US_Full_Name', 
        tou.TU_Id, tou.TU_Name, tou.TU_Description, c.CO_Id
        FROM users u, typesofusers tou, user_type ut, companies c, company_users cu
        WHERE ((ut.UT_US_Id = u.US_Id AND ut.UT_TY_Id = tou.TU_Id) AND (c.CO_Id = cu.CU_CO_Id AND u.US_Id = cu.CU_US_Id))
        AND u.US_Email = :email AND u.US_Password = :password;";

        // prepare the query for execution
        $stmt = $connection->prepare($query);

        // bind the parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // execute the query
        $stmt->execute();

        // get the number of rows
        $numRows = $stmt->rowCount();

        // if the number of rows is greater than 0
        if ($numRows > 0) {
            // get the data from the database
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // set the user data
            $userSession->login($row);

            // get the company data
            if ($userSession->getCompany()->getCompanyData($connection)){
                // save de session data
                $_SESSION['userSession'] = serialize($userSession);

                // redirect to the home page
                header('Location: principal.php');
            } else {
                // show an error message
                echo "The company was not found!";
            }

        } else {
            // show an error message
            echo "The email or password is incorrect!";
        }
    }

?>