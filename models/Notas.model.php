<?php

class Note {
    private $id; // ID de la nota
    private $clientName; // Nombre del cliente
    private $clientEmail; // Email del cliente
    private $clientDirection; // Dirección del cliente
    private $userId; // ID del usuario que creó la nota
    private $folio; // Folio de la nota
    private $subtotal; // Subtotal de la nota
    private $registerDate; // Fecha de registro de la nota
    private $initDate; // Fecha de inicio de la nota
    private $endDate; // Fecha de finalización de la nota
    private $iva; // IVA de la nota
    private $riva; // Retención de IVA de la nota
    private $isr; // ISR de la nota
    private $total; // Total de la nota
    //tabla productos
    private $productName; // Nombre del producto
    private $price; // Precio del producto
    private $description; // Descripción del producto
    //tabla note_product
    private $quantity; // Cantidad del producto
    private $amount; // Monto del producto

    

    // Constructor de la clase
    public function __construct() {
        $this->id = 0;
        $this->clientName = '';
        $this->clientEmail = '';
        $this->clientDirection = '';
        $this->userId = 0;
        $this->folio = '';
        $this->subtotal = 0.0;
        $this->registerDate = '';
        $this->initDate = '';
        $this->endDate = '';
        $this->iva = 0.0;
        $this->riva = 0.0;
        $this->isr = 0.0;
        $this->total = 0.0;
        $this->productName = '';
        $this->price = 0.0;
        $this->description = '';
        $this->quantity = 0;
        $this->amount = 0.0;
        
    }

    // Getters y setters para cada propiedad
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getClientName() {
        return $this->clientName;
    }

    public function setClientName($clientName) {
        $this->clientName = $clientName;
    }

    public function getClientEmail() {
        return $this->clientEmail;
    }

    public function setClientEmail($clientEmail) {
        $this->clientEmail = $clientEmail;
    }

    public function getClientDirection() {
        return $this->clientDirection;
    }

    public function setClientDirection($clientDirection) {
        $this->clientDirection = $clientDirection;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getFolio() {
        return $this->folio;
    }

    public function setFolio($folio) {
        $this->folio = $folio;
    }

    public function getSubtotal() {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function getRegisterDate() {
        return $this->registerDate;
    }

    public function setRegisterDate($registerDate) {
        $this->registerDate = $registerDate;
    }

    public function getInitDate() {
        return $this->initDate;
    }

    public function setInitDate($initDate) {
        $this->initDate = $initDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function getIva() {
        return $this->iva;
    }

    public function setIva($iva) {
        $this->iva = $iva;
    }

    public function getRiva() {
        return $this->riva;
    }

    public function setRiva($riva) {
        $this->riva = $riva;
    }

    public function getIsr() {
        return $this->isr;
    }

    public function setIsr($isr) {
        $this->isr = $isr;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }
    //tabla productos
    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
    }

    //tabla note_product
    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = filter_var($amount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    // Método para obtener los datos de la nota de la base de datos
    public function getNoteData($connection) {
        // Prepara la consulta SQL para seleccionar todas las notas para un usuario específico
        // Esta consulta SQL selecciona todas las columnas (n.*) de la tabla Notes (n)
        // donde existe un registro correspondiente en la tabla User_Notes (un)
        // tal que el UN_US_Id en User_Notes es igual al userId proporcionado.
        $query = "SELECT n.* FROM User_Notes un 
            INNER JOIN Notes n ON un.UN_NO_Id = n.NO_Id 
            WHERE un.UN_US_Id = :userId";

        $stmt = $connection->prepare($query);

        // Vincula el ID del usuario al parámetro de la consulta
        $stmt->bindParam(':userId', $this->userId);

        // Ejecuta la consulta
        $stmt->execute();

        // Obtiene el número de filas devueltas por la consulta
        $numRows = $stmt->rowCount();

        // Inicializa el array para almacenar los datos de las notas
        $notesData = [];

        // Si la consulta devolvió al menos una fila
        if ($numRows > 0) {
            // Itera sobre cada fila devuelta por la consulta
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Agrega cada fila al array de notas
                $notesData[] = [
                    'id' => $row['NO_Id'],
                    'clientName' => $row['NO_CL_Name'],
                    'clientEmail' => $row['NO_CL_Email'],
                    'clientDirection' => $row['NO_CL_Direction'],
                    'folio' => $row['NO_Folio'],
                    'subtotal' => $row['NO_Subtotal'],
                    'registerDate' => $row['NO_Register_Date'],
                    'initDate' => $row['NO_Init_Date'],
                    'endDate' => $row['NO_End_Date'],
                    'iva' => $row['NO_Iva'],
                    'riva' => $row['NO_Riva'],
                    'isr' => $row['NO_Isr'],
                    'total' => $row['NO_Total']
                ];
            }
        }

        // Devuelve el array de notas
        return $notesData;
    }

    public function getProductsForNote($connection, $noteId) {
    $query = "SELECT p.PR_Id, p.PR_Name, p.PR_Price, p.PR_Description, np.NP_Quantity, np.NP_Amount
              FROM Note_Products np
              INNER JOIN Products p ON np.NP_PR_Id = p.PR_Id
              WHERE np.NP_NO_Id = :noteId";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':noteId', $noteId);
    $stmt->execute();

    $products = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = [
            'id' => $row['PR_Id'],
            'name' => $row['PR_Name'],
            'price' => $row['PR_Price'],
            'description' => $row['PR_Description'],
            'quantity' => $row['NP_Quantity'],
            'amount' => $row['NP_Amount']
            ];
        }
        return $products;
    }

 
}
?>
