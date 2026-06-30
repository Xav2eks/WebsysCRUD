<?php

class Usercontroller {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function createUser($firstname, $lastname, $username, $password, $role, $status) {
        return $this->userModel->createUser($firstname, $lastname, $username, $password, $role, $status);
    }

    public function login($username, $password) {
        $user = $this->userModel->getUserByUsername($username);
        
        if ($user && $password === $user['password']) {
            return $user; 
        }
        
        return false; 
    }

}


?>