<?php
    class User {
        private $userID;
        private $fullName;
        private $email;
        private $username;
        private $password;
        private $dateOfBirth;
        private $gender;
        private $userType;
        private $ranking;

        // Constructor
        public function __construct($userID = null, $fullName = null, $email = null, $username = null, $password = null, $dateOfBirth = null, $gender = null, $userType = null, $ranking = null) {
            $this->userID = $userID;
            $this->fullName = $fullName;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
            $this->dateOfBirth = $dateOfBirth;
            $this->gender = $gender;
            $this->userType = $userType;
            $this->ranking = $ranking;
        }

        // Getters and Setters
        public function getUserID() { return $this->userID; }
        public function setUserID($userID) { $this->userID = $userID; }

        public function getFullName() { return $this->fullName; }
        public function setFullName($fullName) { $this->fullName = $fullName; }

        public function getEmail() { return $this->email; }
        public function setEmail($email) { $this->email = $email; }

        public function getUsername() { return $this->username; }
        public function setUsername($username) { $this->username = $username; }

        public function getPassword() { return $this->password; }
        public function setPassword($password) { $this->password = password_hash($password, PASSWORD_DEFAULT); }

        public function getDateOfBirth() { return $this->dateOfBirth; }
        public function setDateOfBirth($dateOfBirth) { $this->dateOfBirth = $dateOfBirth; }

        public function getGender() { return $this->gender; }
        public function setGender($gender) { $this->gender = $gender; }

        public function getUserType() { return $this->userType; }
        public function setUserType($userType) { $this->userType = $userType; }

        public function getRanking() { return $this->ranking; }
        public function setRanking($ranking) { $this->ranking = $ranking; }
    }

?>