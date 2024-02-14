<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $viewTitle ?></title>

    <!-- Including the partial styles  -->
    <?php include_once 'partials/styles.php' ?>

</head>

<body>

    <!-- Import the navigation component view -->
    <?php require_once 'partials/navigation.view.php'; ?>

    <div class="container d-grid align-items-center mt-4">

        <h1>
            <center>Historial de <span>Notas</span></center>
        </h1>

        <table class="table text-center">
            <thead class="bg-primary text-primary">
                <tr>
                    <th scope="col">Nombre del cliente</th>
                    <th scope="col">Correo del cliente</th>
                    <th scope="col">Fecha de registro</th>
                    <th scope="col">
                        <center>Imprimir <i class="fa-solid fa-print"></i></center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($notes as $note) {
                        echo "<tr>";
                        echo "<td><b>" . $note->getClient()->getName() . "</b></td>";
                        echo "<td>" . $note->getClient()->getEmail() . "</td>";
                        echo "<td>" . $note->getRegisterDate() . "</td>";
                        echo "<td><a class='btn btn-info text-light' href='pdf.php?id={$note->getId()}' target='_blank'><i class='fa-solid fa-print'></i></a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>