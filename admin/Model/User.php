<?php
/**
 * Description of User Class represents all user info
 * @property INT $id_user Unique user identifier auto-increment
 * @property STRING $username username chosen by user
 * @property STRING $email user email encrypt
 * @property STRING $password password encrypt 
 * @property INT $type type of user (1 admin, 2 advanced user with certain privilege, 3 basic_user read only)
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class User {

    private $id_user, $username, $email, $password, $type,$activated;
    
    function __construct($id_user, $username, $email, $password, $type, $activated) {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
        $this->activated = $activated;
    }

    function getActivated() {
        return $this->activated;
    }

        function getId_user() {
        return $this->id_user;
    }

    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getType() {
        return $this->type;
    }
}
