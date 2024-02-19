<?php

    // import the file for the theme
    require_once 'models/Theme.model.php';

class Company {
    private $id;
    private $email;
    private $name;
    private $code;
    private $address;
    private $phone;
    private $logo;
    private $website;
    private $theme;
    private $products;
    private $labels;

    // Constructor method
    // Constructor de la clase
    public function __construct($id) {
        $this->id = intval($id);
        $this->email = '';
        $this->name = '';
        $this->code = '';
        $this->address = '';
        $this->phone = '';
        $this->logo = '';
        $this->website = '';
        $this->theme = '';
        $this->products = array();
        $this->labels = array();
    }

    // Method to get the company data from the database
    public function getCompanyData($connection) {
        // create the query
        $query = "SELECT * FROM companies c, company_theme ct, themes t, labels l
        WHERE ((c.CO_Id = ct.CT_CO_Id AND t.TH_Id = ct.CT_TH_Id) and (l.LA_CO_Id = c.CO_Id)) AND c.CO_Id = :id;";

        // prepare the query for execution
        $stmt = $connection->prepare($query);

        // bind the parameters
        $stmt->bindParam(':id', $this->id);

        // execute the query
        $stmt->execute();

        // get the number of rows
        $numRows = $stmt->rowCount();

        // if the number of rows is greater than 0
        if ($numRows > 0) {
            // get the data from the database
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set the data to the properties with the setters
            $this->setId($row['CO_Id']);
            $this->setEmail($row['CO_Email']);
            $this->setName($row['CO_Name']);
            $this->setCode($row['CO_Code']);
            $this->setAddress($row['CO_Direction']);
            $this->setPhone($row['CO_Telephone']);
            $this->setLogo($row['CO_Logo']);
            $this->setWebsite($row['CO_Web']);
            $this->setTheme(new Theme($row['TH_Id'], $row['TH_Name'], $row['TH_File_Name']));
            $this->setLabels(array_slice($row,14));
            
            // get the products
            $this->getProductsData($connection);

            // return true because the company was found
            return true;
        }

        // return false because the company was not found
        return false;
    }

    // Method to get the products from the database
    private function getProductsData($connection) {
        // create the query
        $query = "SELECT products.* FROM products, company_products, companies WHERE (CO_Id = CP_CO_Id AND PR_Id = CP_PR_Id) AND CO_Id = :id;";

        // prepare the query for execution
        $stmt = $connection->prepare($query);

        // bind the parameters
        $stmt->bindParam(':id', $this->id);

        // execute the query
        $stmt->execute();

        // get the number of rows
        $numRows = $stmt->rowCount();

        // if the number of rows is greater than 0
        if ($numRows > 0) {
            // get the data from the database
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // set the data to the property with the setter
            $this->setProducts($rows);

            // return true because the products were found
            return true;
        }

        // return false because the products were not found
        return false;
    }

    // Getters and setters for the properties
    public function getId() {
        return $this->id;
    }

    private function setId($id) {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getEmail() {
        return $this->email;
    }

    private function setEmail($email) {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function getName() {
        return $this->name;
    }

    private function setName($name) {
        $this->name = filter_var($name, FILTER_SANITIZE_STRING);
    }

    public function getCode() {
        return $this->code;
    }

    private function setCode($code) {
        $this->code = filter_var($code, FILTER_SANITIZE_STRING);
    }

    public function getAddress() {
        return $this->address;
    }

    private function setAddress($address) {
        $this->address = filter_var($address, FILTER_SANITIZE_STRING);
    }

    public function getPhone() {
        return $this->phone;
    }

    private function setPhone($phone) {
        $this->phone = filter_var($phone, FILTER_SANITIZE_STRING);
    }

    public function getLogo() {
        return $this->logo;
    }

    private function setLogo($logo) {
        $this->logo = filter_var($logo, FILTER_SANITIZE_STRING);
    }

    public function getWebsite() {
        return $this->website;
    }

    private function setWebsite($website) {
        $this->website = filter_var($website, FILTER_SANITIZE_STRING);
    }

    public function getTheme() {
        return $this->theme;
    }

    private function setTheme($theme) {
        $this->theme = filter_var($theme, FILTER_SANITIZE_STRING);
    }

    public function getProducts() {
        return $this->products;
    }

    private function setProducts($products) {
        $this->products = $products;
    }

    public function getLabels() {
        return $this->labels;
    }

    private function setLabels($labels) {
        $this->labels = $labels;
    }
}