<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $viewTitle ?></title>

    <!-- Including the partial styles  -->
    <?php include_once 'partials/styles.php' ?>

</head>

<body>

    <!-- Import the navigation component view -->
    <?php require_once 'components/navigation.view.php'; ?>

    <div class="container d-grid align-items-center mt-4">

        <h1>
            <center>Bienvenido
                <span>
                    <!-- show the name of the user in uppercase -->
                    <?php echo mb_strtoupper($userSession->getUser()->getFullName(), 'UTF-8'); ?>
                </span>
            </center>
        </h1>

        <p>
            <center> Gracias por visitar nuestro sitio web. Esperamos que te sientas cómodo y encuentres la información
                que estás buscando.</center>
        </p>
    </div>
</body>

</html>