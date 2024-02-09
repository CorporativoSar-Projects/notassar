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

        <h1 class="text-center">Generar <span>Nueva nota</span></h1>

        <form action="calculo.php" name="notas" method="POST" class="row d-flex mt-4 gap-4">


            <div class="col-md-5 card pt-4 px-4">
                <section>
                    <h2>Datos de la nota:</h2>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Folio:</span>
                        <input type="text" class="form-control" disabled value="<?php echo $foliio;?>"
                            required="true" />
                        <input type="hidden" class="form-control" name="folio" id="folio" value="<?php echo $foliio;?>"
                            required="true" />
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="tipoNota">Tipo de nota</label>
                        <select class="form-select" name="tipoNota" id="tipoNota" required="true">
                            <option selected value="">Seleccionar</option>
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
                        <input type="date" class="form-control" name="initDate" required="true" />
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Fecha de Termino:</span>
                        <input type="date" class="form-control" name="endDate" required="true" />
                    </div>
                </section>
            </div>

            <section class="col-md-6 d-flex flex-column gap-3">
                <div class="d-flex justify-content-end">

                    <button type="button" class="btn btn-primary" id="addProduct" onclick="addNewProductCard()">Agregar
                        producto</button>
                </div>

                <div id="productslist" class="px-3">
                    <div class="card py-4 px-3 producto mb-4 mt-4">
                        <h5>Producto 1</h5>

                        <div class="input-group">
                            <select class="form-select" name="products[]" id="products" required="true">
                                <option value="">Seleccionar</option>
                                <?php
                                    foreach ($productos as $producto) {
                                        echo "<option value='{$producto['PR_Id']}'>
                                                <p>{$producto['PR_Name']}</p>
                                                <span>$ {$producto['PR_Price']} MXN</span>
                                                </option>";
                                    }
                                ?>
                            </select>
                            <input type="number" class="form-control" name="quantity[]" placeholder="Cantidad"
                                required="true" />
                            <button type="button" class="btn btn-danger" onclick="eliminarElemento(this)">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </section>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Generar nota</button>
                <!-- button to clean the form -->
                <button type="reset" class="btn btn-danger">Limpiar</button>
            </div>
        </form>
    </div>

    <!-- Including the script for add a new card product -->
    <script src="js/addNewProductCard.js"></script>
</body>

</html>