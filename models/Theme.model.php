<?php

    class Theme{
        private $id;
        private $name;
        private $location;

        // constructor
        public function __construct($id = 0, $name = '', $location = '') {
            $this->id = $id;
            $this->name = $name;
            $this->location = $location;
        }

        // setter and getter for the properties
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = filter_var($name, FILTER_SANITIZE_STRING);
        }

        public function getLocation() {
            return $this->location;
        }

    }

?>