<?php

    class User {
        private $id;
        private $fullName;
        private $email;
        private $typeOfUser;
        private $typeOfUserName;
        private $typeOfUserDescription;

        public function __construct($user) {
            $this->id = $user['US_Id'];
            $this->fullName = $user['US_Full_Name'];
            $this->email = $user['US_Email'];
            $this->typeOfUser = $user['TU_Id'];
            $this->typeOfUserName = $user['TU_Name'];
            $this->typeOfUserDescription = $user['TU_Description'];
        }

        // Getters and setters for the properties

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        }

        public function getFullName() {
            return $this->fullName;
        }

        public function setFullName($name) {
            $this->fullName = filter_var($name, FILTER_SANITIZE_STRING);
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        }

        public function getTypeOfUser() {
            return $this->typeOfUser;
        }

        public function setTypeOfUser($typeOfUser) {
            $this->typeOfUser = filter_var($typeOfUser, FILTER_SANITIZE_NUMBER_INT);
        }

        public function getTypeOfUserName() {
            return $this->typeOfUserName;
        }

        public function setTypeOfUserName($typeOfUserName) {
            $this->typeOfUserName = filter_var($typeOfUserName, FILTER_SANITIZE_STRING);
        }

        public function getTypeOfUserDescription() {
            return $this->typeOfUserDescription;
        }

        public function setTypeOfUserDescription($typeOfUserDescription) {
            $this->typeOfUserDescription = filter_var($typeOfUserDescription, FILTER_SANITIZE_STRING);
        }
    }
    

?>