<?php
    class DatabaseConnection {
        private $host;
        private $dbname;
        private $username;
        private $password;
        private $pdo;


        // constructor
        public function __construct($host, $dbname, $username, $password) {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;
        }


        // function to connect to the database
        public function connect() {
            try {
                $dsn = "mysql:host=$this->host;dbname=$this->dbname";
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected to the database successfully!";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }


        // function to close the database connection
        public function close() {
            $this->pdo = null;
        }

        // function to get the database connection
        public function getConnection() {
            return $this->pdo;
        }
    } 
?>