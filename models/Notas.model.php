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
    // Método para obtener los datos de la nota de la base de datos
    public function getNoteData($connection) {
        // Prepara la consulta SQL para seleccionar todas las notas para un usuario específico
        $query = "SELECT * FROM notes WHERE NO_US_Id = :userId";
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
                    'userId' => $row['NO_US_Id'],
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
    public function getNoteById($connection, $noteId) {
        // Prepara la consulta SQL para seleccionar una nota específica por su ID
        $query = "SELECT * FROM notes WHERE NO_Id = :noteId";
        $stmt = $connection->prepare($query);
    
        // Vincula el ID de la nota al parámetro de la consulta
        $stmt->bindParam(':noteId', $noteId, PDO::PARAM_INT);
    
        // Ejecuta la consulta
        $stmt->execute();
    
        // Obtiene el registro devuelto por la consulta
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Si se encontró una nota con el ID proporcionado
        if ($row) {
            // Devuelve la información de la nota en un array
            return [
                'id' => $row['NO_Id'],
                'clientName' => $row['NO_CL_Name'],
                'clientEmail' => $row['NO_CL_Email'],
                'clientDirection' => $row['NO_CL_Direction'],
                'userId' => $row['NO_US_Id'],
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
    
        // Devuelve null si no se encontró la nota
        return null;
    }
    

 
}
?>
