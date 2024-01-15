<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $viewTitle ?></title>

    <!-- Including the partial styles  -->
    <?php include 'partials/styles.php' ?>

</head>

<body>
    <!-- Import the navigation component view -->
    <?php require_once 'partials/navigation.view.php'; ?>

    <div class="container mt-4">

        <h1 class="text-center">Bienvenido Corporativo SAR</h1>

        <form action="calculo.php" name="notas" method="POST">


            <section class="data_note" required>
                <h2>Datos de la nota:</h2>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Folio:</span>
                    <input type="text" class="form-control" disabled value="<?php echo $foliio;?>" required="true" />
                    <input type="hidden" class="form-control" name="folio" id="folio" value="<?php echo $foliio;?>" required="true" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="tipoNota">Tipo de nota</label>
                    <select class="form-select" name="tipoNota" id="tipoNota">
                        <option selected>Seleccionar</option>
                        <?php
                            foreach ($noteTypes as $noteType) {
                                // show the note type name in uppercase
                                echo "<option value='{$noteType['TN_Id']}'>" . strtoupper($noteType['TN_Name']) ." {$noteType['TN_Percentage']}% </option>";
                            }
                        ?>
                    </select>
                </div>
            </section>

            <section class="data_client">
                <h2>Datos del cliente</h2>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nombre del cliente:</span>
                    <input type="text" class="form-control" name="nomCliente" required="true" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Correo del cliente:</span>
                    <input type="text" class="form-control" name="corrCliente" required="true" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Telefono del cliente:</span>
                    <input type="text" class="form-control" name="telefono" required="true" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Domicilio del cliente:</span>
                    <input type="text" class="form-control" name="domicilio" required="true" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Fecha de Inicio:</span>
                    <input type="date" class="form-control" name="initDate" required="true">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Fecha de Termino:</span>
                    <input type="date" class="form-control" name="endDate" required="true">
                </div>
            </section>

            <section class="data_products">
                <h2>Datos de los productos</h2>

                <?php

                for ($i = 0; $i < 4; $i++) {
                    $numero  = $i + 1;

                    $item = "<div class='input-group mb-3'>
                            <span class='input-group-text'>Producto {$numero}:</span>
                            <select class='form-select' name='products[]' id='products[]'>
                            <option>Seleccionar</option>";

                            foreach ($productos as $producto) {
                                $item .= "<option value='{$producto['PR_Id']}'>
                                        <p>{$producto['PR_Name']}</p>
                                        <span>$ {$producto['PR_Price']} MXN</span>
                                        </option>";
                            }

                            $item .= "</select>
                            <input type='number' class='form-control' name='quantity[]' placeholder='Cantidad' />
                            </div>";
                            echo $item;
                }
                ?>

            </section>

            <input id="bCG" type="submit" value="Calcular pagos" />
        </form>

        <br><br>
    </div>
</body>

</html>