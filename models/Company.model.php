<?php

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
    public function __construct() {
        $this->id = 0;
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

    // Getters and setters for the properties
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = filter_var($name, FILTER_SANITIZE_STRING);
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = filter_var($code, FILTER_SANITIZE_STRING);
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = filter_var($address, FILTER_SANITIZE_STRING);
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = filter_var($phone, FILTER_SANITIZE_STRING);
    }

    public function getLogo() {
        return $this->logo;
    }

    public function setLogo($logo) {
        $this->logo = filter_var($logo, FILTER_SANITIZE_STRING);
    }

    public function getWebsite() {
        return $this->website;
    }

    public function setWebsite($website) {
        $this->website = filter_var($website, FILTER_SANITIZE_STRING);
    }

    public function getTheme() {
        return $this->theme;
    }

    public function setTheme($theme) {
        $this->theme = filter_var($theme, FILTER_SANITIZE_STRING);
    }

    public function getProducts() {
        return $this->products;
    }

    public function setProducts($products) {
        $this->products = $products;
    }

    public function getLabels() {
        return $this->labels;
    }

    public function setLabels($labels) {
        $this->labels = $labels;
    }

    // Method to get the company data from the database
    public function getCompanyData($connection) {
        // create the query
        $query = "SELECT * FROM companies WHERE CO_Id = :id";

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

            // set the data to the properties
            $this->id = $row['CO_Id'];
            $this->email = $row['CO_Email'];
            $this->name = $row['CO_Name'];
            $this->code = $row['CO_Code'];
            $this->address = $row['CO_Address'];
            $this->phone = $row['CO_Phone'];
            $this->logo = $row['CO_Logo'];
            $this->website = $row['CO_Website'];
            $this->theme = $row['CO_Theme'];

            // get the products
            $this->getProductsData($connection);
            // get the labels
            $this->getLabelsData($connection);

            // return true because the company was found
            return true;
        }

        // return false because the company was not found
        return false;
    }
}
