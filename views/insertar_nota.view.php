<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- include the partial styles -->
    <?php include_once 'partials/styles.php' ?>

    <title><?php echo $viewTitle ?></title>
</head>

<body>

    <!-- import the navigation component view -->
    <?php require_once 'partials/navigation.view.php'; ?>

    <h1 class="mt-4">
        <center>Notar <span>Generada</span></center>
    </h1>

    <div class="container">
        <!-- <iframe src="./components/pdf.view.comp.php?dato=<?php echo htmlspecialchars($json_data) ?>" width="100%" height="600"></iframe> -->
        <iframe src="pdf.php?dato=<?php echo htmlspecialchars($json_data) ?>" width="100%" height="600"></iframe>
    </div>

</body>

</html>