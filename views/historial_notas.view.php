<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $viewTitle ?></title>

    <!-- Including the partial styles  -->
    <?php include_once 'partials/styles.php' ?>
    <script src="https://kit.fontawesome.com/74b37c5ea4.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Import the navigation component view -->
    <?php require_once 'partials/navigation.view.php'; ?>

    <div class="container d-grid align-items-center mt-4">

        <h1>
            <center>historial de notas
                <span>

                    <div class="container mt-4">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Email del Cliente</th>
                                    <th>Total</th>

                                    <th>Fecha Registro</th>
                                    <th>PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notes as $nota) : ?>
                                    <tr>
                                         <!-- Cada <td> representa una celda en la fila de la tabla. -->
                                        <!-- htmlspecialchars se utiliza para evitar la inyección de código HTML. -->
                                        <td><?php echo htmlspecialchars($nota['clientEmail']); ?></td>
                                        <td><?php echo htmlspecialchars($nota['total']); ?></td>
                                        <td><?php echo htmlspecialchars($nota['registerDate']); ?></td>
                                       
                                        <td class="align-middle text-center">
                                            <!-- Un formulario que envía datos a pruebaV.php en una nueva pestaña cuando se presiona el botón de enviar. -->
                                            <form action="fpdf183/pruebaV.php" method="post" target="_blank">
                                                <!-- Cada input type="hidden" contiene un valor que se enviará con el formulario. -->
                                                <!-- Los valores son extraídos del array $nota. -->
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($nota['id']); ?>">
                                                <input type="hidden" name="clientName" value="<?php echo htmlspecialchars($nota['clientName']); ?>">
                                                <input type="hidden" name="clientEmail" value="<?php echo htmlspecialchars($nota['clientEmail']); ?>">
                                                <input type="hidden" name="clientDirection" value="<?php echo htmlspecialchars($nota['clientDirection']); ?>">
                                                <input type="hidden" name="folio" value="<?php echo htmlspecialchars($nota['folio']); ?>">
                                                <input type="hidden" name="subtotal" value="<?php echo htmlspecialchars($nota['subtotal']); ?>">
                                                <input type="hidden" name="registerDate" value="<?php echo htmlspecialchars($nota['registerDate']); ?>">
                                                <input type="hidden" name="initDate" value="<?php echo htmlspecialchars($nota['initDate']); ?>">
                                                <input type="hidden" name="endDate" value="<?php echo htmlspecialchars($nota['endDate']); ?>">
                                                <input type="hidden" name="iva" value="<?php echo htmlspecialchars($nota['iva']); ?>">
                                                <input type="hidden" name="riva" value="<?php echo htmlspecialchars($nota['riva']); ?>">
                                                <input type="hidden" name="isr" value="<?php echo htmlspecialchars($nota['isr']); ?>">
                                                <input type="hidden" name="total" value="<?php echo htmlspecialchars($nota['total']); ?>">
                                                <!-- Agrega aquí cualquier otro campo que necesites -->
                                                <?php foreach ($nota['products'] as $product) : ?>
                                                    <input type="hidden" name="productName" value="<?php echo htmlspecialchars($product['name']); ?>">
                                                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                                                    <input type="hidden" name="description" value="<?php echo htmlspecialchars($product['description']); ?>">
                                                    <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>">
                                                    <input type="hidden" name="amount" value="<?php echo htmlspecialchars($product['amount']); ?>">
                                                    
                                                <?php endforeach; ?>
                                                <!-- El botón de enviar del formulario. Cuando se presiona, se envían los datos del formulario y se abre pruebaV.php en una nueva pestaña. -->
                                                <button type="submit" class="btn btn-link">
                                                    
                                                    <i class="fa-solid fa-file-pdf"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </span>
            </center>
        </h1>



        
    </div>
</body>

</html>