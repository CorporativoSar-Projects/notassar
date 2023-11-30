<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $viewTitle ?></title>

    <!-- Including the partial styles  -->
    <?php include_once 'partials/styles.php' ?>

    <!-- Including the styles for the login page -->
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    
</head>

<body>
    <header>
        <img src="img/logo.png" id="logo">
    </header>

    <section>
        <form action="" method="post">
            <h1>InNotes</h1>
            <h3>Powered by Innsol Corporation</h3>
            <img src="./img/user.icon.png" alt="icon for the user login">

            <!-- input for the email user -->
            <input type="email" name="email" id="email" placeholder="Correo electrónico" required="true">
            <!-- input for the password user -->
            <input type="password" name="password" id="password" placeholder="Contraseña" required="true">

            <!-- button for the user login -->
            <input type="submit" value="Ingresar" class="aceptar">
        </form>
    </section>
</body>

</html>