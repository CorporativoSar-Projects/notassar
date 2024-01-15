<?php

    class Note {
        // Attributes
        private $id;
        private $folio;
        private $subtotal;
        private $registerDate;
        private $initDate;
        private $endDate;
        private $iva;
        private $total;
        private $clientId;
        private $noteTypeId;
        private $noteProducts;

        // Constructor
        public function __construct($id, $folio, $subtotal, $registerDate, $initDate, $endDate, $iva, $rIva, $isr, $total, $usId, $clientId, $noteTypeId, $statusId, $noteProducts) {
            $this->id = $id;
            $this->folio = $folio;
            $this->subtotal = $subtotal;
            $this->registerDate = $registerDate;
            $this->initDate = $initDate;
            $this->endDate = $endDate;
            $this->iva = $iva;
            $this->rIva = $rIva;
            $this->isr = $isr;
            $this->total = $total;
            $this->usId = $usId;
            $this->clientId = $clientId;
            $this->noteTypeId = $noteTypeId;
            $this->statusId = $statusId;
            $this->noteProducts = $noteProducts;
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

        public function getClientId() {
            return $this->clientId;
        }

        public function getNoteTypeId() {
            return $this->noteTypeId;
        }

        public function getNoteProducts() {
            return $this->noteProducts;
        }

    }