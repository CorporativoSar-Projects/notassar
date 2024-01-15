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
        <h1 class="my-4" >
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
                    <p><strong>Tipo de nota:</strong> <?php echo $noteType['TN_Name'] ?></p>
                    <p><strong>Fecha de inicio:</strong> <?php echo $Note->getInitDate(); ?></p>
                    <p><strong>Fecha de termino:</strong> <?php echo $Note->getEndDate(); ?></p>

                    <!-- show the data of the products -->
                    <table class="table text-center">
                        <thead class="thead-dark">
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
								// get the product object from the company products
								$productObject = $product['product'];
								// get the quantity of the product
								$productQuantity = $product['quantity'];
								// get the price of the product
								$productPrice = $productObject['PR_Price'];
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
							?>

                        </tbody>
                    </table>

                    <!-- show the data of the total -->
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">SUBTOTAL</th>
                                <th scope="col">IVA</th>
                                <th scope="col">RETENCIÓN IVA</th>
                                <th scope="col">RETENCIÓN ISR</th>
                                <th scope="col">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <?php
									echo "<td>$ ".number_format($subtotal,2)." MXN</td>";
									echo "<td>$ ".number_format($iva,2)." MXN</td>";
									echo "<td>$ ".number_format($iva,2)." MXN</td>";
									echo "<td>$ ".number_format($iva,2)." MXN</td>";
									echo "<td>$ ".number_format($total,2)." MXN</td>";
								?>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </section>
        <button type="submit" class="btn btn-primary mt-4">Guardar datos y continuar</button>

    </div>


</body>

</html>