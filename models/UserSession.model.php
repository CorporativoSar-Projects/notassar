<?php

    // import the file for the user
    include_once 'models/User.model.php';

    // import the file for the company
    include_once 'models/Company.model.php';

    class UserSession {
        private $user;
        private $isLoggedIn;
        private $company;

        // constructor
        public function __construct() {
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
            if (isset($_SESSION['userSession'])) {
                $this->getDataSession();
                return true;
            } else {
                return false;
            }
        }

        // set the data in session
        public function login($data) {
            // create the user object
            $user = new User($data);

            // create the company object
            $company = new Company($data['CO_Id']);

            // set the data in UserSession
            $this->user = $user;
            $this->isLoggedIn = true;
            $this->company = $company;
        }


        //get data from session
        public function getDataSession() {
            $session = unserialize($_SESSION['userSession']);
            $this->user = $session->getUser();
            $this->company = $session->getCompany();
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

        public function getCompany() {
            return $this->company;
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

        public function setCompany($company) {
            $this->company = $company;
        }
       
    }

?>