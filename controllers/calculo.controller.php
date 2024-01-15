<?php
    // this variable is used to set the page title
    $viewTitle = 'Calculo';

    // get the data from the post request
    $folio = $_POST['folio'];
    $noteTypeId = intval($_POST['tipoNota']);
    
    
    $clientName = $_POST['nomCliente'];
    $clientEmail = $_POST['corrCliente'];
    $clientPhone = $_POST['telefono'];
    $clientAddress = $_POST['domicilio'];
    $initDate = $_POST['initDate'];
    $endDate = $_POST['endDate'];
    
    $products = $_POST['products'];
    $quantity = $_POST['quantity'];

    $total = 0;
    $subtotal = 0;
    $iva = 0;

    // obtener los tipos de notas
    $query = "SELECT * FROM typesofnotes WHERE TN_Id = '$noteTypeId'";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    // guardar el tipo de nota en una variable
    $noteType = $stmt->fetch(PDO::FETCH_ASSOC);

    $lista = array();

    $companyProducts = $userSession->getCompany()->getProducts();

    // get the products data from the post request in a array with both id and quantity 
    foreach ($products as $key => $product) {
        // insert only the products that have a id
        if (intval($product) != 0) {
            // get the product object from the company products
            $indice = array_search($product, array_column($companyProducts, 'PR_Id'));

            $productObject = $companyProducts[$indice];

            // add the product to the list
            array_push($lista, array(
                'product' => $productObject,
                'quantity' => $quantity[$key]
            ));
        }

    }

    // calculate the total of the note
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
        
        $subtotal += $productTotal;
    }

    $iva = $subtotal * 0.16;
    $total = $subtotal + $iva;
    

    // include the model for the note
    require_once 'models/Note.model.php';

    // new note object
    $Note = new Note(
        null,
        $folio,
        null,
        null,
        $initDate,
        $endDate,
        null,
        null,
        null,
        null,
        null,
        null,
        $noteTypeId,
        null,
        null
    );

?>