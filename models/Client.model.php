<?php

/*
    * Client model
    * 
    * This model is used to manage the clients data
    * 
    * @package models/Client.model.php
    * @since 0.1
*/

class Client implements JsonSerializable{
    // attributes
    private $id;
    private $name;
    private $email;
    private $address;
    private $number;

    // constructor
    public function __construct($id, $name, $email, $address, $number) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->number = $number;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

    // getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = intval($id);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = strval($name);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = strval($email);
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = strval($address);
    }

    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = strval($number);
    }

}

?>