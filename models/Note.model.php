<?php

    class Note implements JsonSerializable{
        // Attributes
        private $id;
        private $folio;
        private $subtotal;
        private $registerDate;
        private $initDate;
        private $endDate;
        private $iva;
        private $total;
        private $client;
        private $noteTypeId;
        private $noteProducts;

        // Constructor
        public function __construct($id, $folio, $subtotal, $registerDate, $initDate, $endDate, $iva, $total, $usId, $client, $noteTypeId, $noteProducts) {
            $this->id = $id;
            $this->folio = $folio;
            $this->subtotal = $subtotal;
            $this->registerDate = $registerDate;
            $this->initDate = $initDate;
            $this->endDate = $endDate;
            $this->iva = $iva;
            $this->total = $total;
            $this->usId = $usId;
            $this->client = $client;
            $this->noteTypeId = $noteTypeId;
            $this->noteProducts = $noteProducts;
        }

        public function jsonSerialize() {
            return get_object_vars($this);
        }

        // Getters
        public function getId() {
            return $this->id;
        }

        public function getFolio() {
            return $this->folio;
        }

        public function getSubtotal() {
            return $this->subtotal;
        }

        public function getRegisterDate() {
            return $this->registerDate;
        }

        public function getInitDate() {
            return $this->initDate;
        }

        public function getEndDate() {
            return $this->endDate;
        }

        public function getIva() {
            return $this->iva;
        }

        public function getTotal() {
            return $this->total;
        }

        public function getClient() {
            return $this->client;
        }

        public function getNoteTypeId() {
            return $this->noteTypeId;
        }

        public function getNoteProducts() {
            return $this->noteProducts;
        }

        // Setters
        public function setId($id) {
            $this->id = $id;
        }

        public function setFolio($folio) {
            $this->folio = $folio;
        }

        public function setSubtotal($subtotal) {
            $this->subtotal = $subtotal;
        }

        public function setRegisterDate($registerDate) {
            $this->registerDate = $registerDate;
        }

        public function setInitDate($initDate) {
            $this->initDate = $initDate;
        }

        public function setEndDate($endDate) {
            $this->endDate = $endDate;
        }

        public function setIva($iva) {
            $this->iva = $iva;
        }

        public function setTotal($total) {
            $this->total = $total;
        }

        public function setClient($client) {
            $this->client = $client;
        }

        public function setNoteTypeId($noteTypeId) {
            $this->noteTypeId = $noteTypeId;
        }

        public function setNoteProducts($noteProducts) {
            $this->noteProducts = $noteProducts;
        }

        // Methods

    }