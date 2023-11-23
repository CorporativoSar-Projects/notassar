<?php

    // import the file for the user
    include_once 'models/User.model.php';

    class UserSession {
        private $userId;
        private $user;
        private $isLoggedIn;

        // constructor
        public function __construct() {
            $this->userId = 0;
            $this->user = null;
            $this->isLoggedIn = false;

            // start the session
            $this->startSession();
        }

        // start the session
        public function startSession() {
            session_start();
        }

        // validate if the user is logged in or not
        public function validateSession() {
            if (isset($_SESSION['userId'])) {
                $this->getDataSession();
                return true;
            } else {
                return false;
            }
        }

        // set the data in session
        public function login($data) {
            $user = new User($data);

            $_SESSION['userId'] = $user->getId();

            // save the user in session
            // guardar el usuario en la sesion
            $_SESSION['user'] = $user;

            $this->userId = $user->getId();
            $this->user = $user;
            $this->isLoggedIn = true;
        }


        //get data from session
        public function getDataSession() {
            $this->userId = $_SESSION['userId'];
            $this->user = $_SESSION['user'];
            $this->isLoggedIn = true;
        }

        // destroy the session
        public function logout() {
            session_unset();
            session_destroy();
            $this->isLoggedIn = false;
        }

        // getters
        public function isLoggedIn() {
            return $this->isLoggedIn;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function getUser() {
            return $this->user;
        }

        // setters
        public function setUserId($userId) {
            $this->userId = $userId;
        }

        public function setUser($user) {
            $this->user = $user;
        }

        public function setIsLoggedIn($isLoggedIn) {
            $this->isLoggedIn = $isLoggedIn;
        }
       
    }

?>