<?php
class Product{
    private $id;
    private $productName;
    private $price;
    private $description;

    public function __construct(){
        $this->id = 0;
        $this->productName = '';
        $this->price = 0.0;
        $this->description = '';
    }
    //Getters and setters for the properties
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }
    public function getProductName(){
        return $this->productName;
    }
    public function setProductName($productName){
        $this->productName = filter_var($productName, FILTER_SANITIZE_STRING);
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
    }
    public function getProductData($connection){
        $query = "SELECT * FROM products where PR_id = :id";
        $stmt = $connection->prepare($query);
        // Vincula el ID del usuario al parámetro de la consulta
        $stmt->bindParam(':userId', $this->id);
        $stmt->execute();
        $numrows = $stmt->rowCount();
        $productsData = [];
        if($numrows > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $productsData[] = [
                    'id' => $row['PR_Id'],
                    'productName' => $row['PR_Name'],
                    'price' => $row['PR_Price'],
                    'description' => $row['PR_Description']
                ];
            }
        }
        return $productsData;
    }
}

?>