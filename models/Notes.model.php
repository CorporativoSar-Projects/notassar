<?php
    class Notes {
        private $id; 
        private $name; 
        private $email;
        private $phone;
        private $direction; 
        private $usId; 
        private $folio; 
        private $subtotal; 
        private $registerDate; 
        private $initDate; 
        private $endDate; 
        private $iva; 
        private $rIva; 
        private $isr; 
        private $total;

       
        
        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }
        public function getPhone(){
            return $this->phone;
        }
    
        public function setPhone($phone){
            $this->phone = $phone;
        }
    
        public function getDirection(){
            return $this->direction;
        }
    
        public function setDirection($direction){
            $this->direction = $direction;
        }
    
        public function getUsId(){
            return $this->usId;
        }
    
        public function setUsId($usId){
            $this->usId = $usId;
        }
    
        public function getFolio(){
            return $this->folio;
        }
    
        public function setFolio($folio){
            $this->folio = $folio;
        }
    
        public function getSubtotal(){
            return $this->subtotal;
        }
    
        public function setSubtotal($subtotal){
            $this->subtotal = $subtotal;
        }
    
        public function getRegisterDate(){
            return $this->registerDate;
        }
    
        public function setRegisterDate($registerDate){
            $this->registerDate = $registerDate;
        }
    
        public function getInitDate(){
            return $this->initDate;
        }
    
        public function setInitDate($initDate){
            $this->initDate = $initDate;
        }
    
        public function getEndDate(){
            return $this->endDate;
        }
    
        public function setEndDate($endDate){
            $this->endDate = $endDate;
        }
    
        public function getIva(){
            return $this->iva;
        }
    
        public function setIva($iva){
            $this->iva = $iva;
        }
    
        public function getRIva(){
            return $this->rIva;
        }
    
        public function setRIva($rIva){
            $this->rIva = $rIva;
        }
    
        public function getIsr(){
            return $this->isr;
        }
    
        public function setIsr($isr){
            $this->isr = $isr;
        }
    
        public function getTotal(){
            return $this->total;
        }
    
        public function setTotal($total){
            $this->total = $total;
        }

    }
?>