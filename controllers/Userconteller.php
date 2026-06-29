<?php

class Usercontroller {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function getAllUsers() {
        return $this->userModel->getAllUsers();
    }

    public function getUserById($id) {
        return $this->userModel->getUserById($id);
    }

    public function updateUser($id, $name, $role, $status) {
        return $this->userModel->updateUser($id, $name, $role, $status);
    }

    public function createUser($name, $role, $status) {
        return $this->userModel->createUser($name, $role, $status);
    }

}


?>