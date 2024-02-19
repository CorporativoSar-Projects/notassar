<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $viewTitle ?></title>
    <!-- Including the partial styles  -->
    <?php include 'partials/styles.php' ?>

</head>

<body>

    <!-- Include de navigation view -->
    <?php require_once 'partials/navigation.view.php'; ?>

    <div class="container mt-4">
        <h1 class="my-4">
            <center>Resumen de la Nota con folio <span><?php echo $Note->getFolio() ?></span> </center>
        </h1>

        <section class="d-flex gap-2">
            <div class="col-md-4 card">
                <h2 class="card-header">Datos del cliente</h2>
                <div class="card-body">
                    <!-- show the data of the client -->
                    <p><strong>Nombre:</strong> <?php echo $clientName ?></p>
                    <p><strong>Correo:</strong> <?php echo $clientEmail ?></p>
                    <p><strong>Telefono:</strong> <?php echo $clientPhone ?></p>
                    <p><strong>Domicilio:</strong> <?php echo $clientAddress ?></p>
                </div>
            </div>

            <div class="col-md-8 card">
                <h2 class="card-header">
                    <center>Datos de la nota</center>
                </h2>

                <div class="card-body">
                    <!-- show the data of the note -->
                    <div class="d-flex mb-4">
                        <div class="col-md-6">
                            <p>
                                <strong>Tipo de nota:</strong>
                                <?php echo $noteType['TN_Name'] ?>
                                <span class="badge text-bg-secondary">
                                    <?php echo doubleval($noteType['TN_Percentage']) . "%" ?>
                                </span>
                            </p>
                            <p><strong>Fecha de inicio:</strong> <?php echo $Note->getInitDate(); ?></p>
                            <p><strong>Fecha de termino:</strong> <?php echo $Note->getEndDate(); ?></p>
                        </div>
                        <!-- show the total data-->

                        <div class="col-md-4">
                            <p>
                                <strong>Subtotal:</strong>
                                $<?php echo number_format($subtotal,2)  ?> MXN
                            </p>
                            <p>
                                <strong><?php echo $noteType['TN_Name'] ?>:</strong>
                                $<?php echo number_format($iva, 2) ?> MXN
                            </p>
                            <p>
                                <strong>Total:</strong>
                                $<?php echo number_format($total, 2) ?> MXN
                            </p>
                        </div>

                    </div>

                    <!-- show the data of the products -->
                    <table class="table text-center">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">SERVICIO</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">PRECIO UNITARIO</th>
                                <th scope="col">IMPORTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- show the list products -->
                            <?php
							foreach ($lista as $key => $product) {
								// get the quantity of the product
								$productQuantity = $product['NP_Quantity'];
								// get the price of the product
								$productPrice = $product['PR_Price'];
								// get the name of the product
								$productName = $productObject['PR_Name'];
								// get the total of the product
								$productTotal = $productQuantity * $productPrice;
								
								echo "<tr>";
								echo "<th scope='row'>".($key+1)."</th>";
								echo "<td>$productName</td>";
								echo "<td>$productQuantity</td>";
								echo "<td>$ ".number_format($productPrice,2)." MXN</td>";
								echo "<td>$ ".number_format($productTotal,2)." MXN</td>";
								echo "</tr>";
							}

                            // show the total data
                            echo "<tr>";
                            echo "<th scope='row'></th>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td><strong>Subtotal</strong></td>";
                            echo "<td>$ ".number_format($subtotal,2)." MXN</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<th scope='row'></th>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td><strong>$noteType[TN_Name]</strong></td>";
                            echo "<td>$ ".number_format($iva,2)." MXN</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<th scope='row'></th>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td><strong>Total</strong></td>";
                            echo "<td>$ ".number_format($total,2)." MXN</td>";
                            echo "</tr>";
							?>

                        </tbody>
                    </table>
                    <!-- buttons to continue or cancel -->
                    <form class="d-flex justify-content-end mt-4 gap-2" method="POST" action="insertar_nota.php">
                        <a href="notas.php" class="btn btn-danger">Cancelar </a>
                        <!-- send the noteData that was serializing -->
                        <input type="hidden" name="json_data" value="<?php echo htmlspecialchars($noteData) ?>">
                        <button type="submit"  class="btn btn-success">Guardar datos y continuar</button>
                    </form>

                </div>
            </div>
        </section>


    </div>


</body>

</html>