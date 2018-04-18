<?php

/**
 * Description of User_core Controller Class to obtain, modify and work with User info
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class User_core extends Main {

    private $key = "Pizarra_User";

    function verifyUser($email, $password) {
        $this->Setkey($this->key);
        $passEncrypt = Crypt_core::encrypt($password);
        $emailEncrypt = Crypt_core::encrypt($email);
        $query = "select * from p10p_users where email='$emailEncrypt' OR username='$emailEncrypt' AND password='$passEncrypt' AND activated=1";
        $resultArray = $this->db->executeSelectQuery($query);
        if (count($resultArray) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function registerUser($username, $email, $pass, $role) {
        if ($this->VerifyUserEmail($email)) {
            return array(false, 1);
        } else {
            $this->Setkey($this->key);
            $emailEncrypt = Crypt_core::encrypt($email);
            $passEncrypt = Crypt_core::encrypt($pass);
            $usernameEncrypt = Crypt_core::encrypt($username);
            $query = "insert into p10p_users(username,email,password,type,activated) values ('$usernameEncrypt','$emailEncrypt','$passEncrypt',$role,0)";
            if ($this->db->executeQuery($query)) {
                return array(true, 0);
            } else {
                return array(false, 2);
            }
        }
    }

    function activateUser($idUser, $passwordNew) {
        $this->Setkey($this->key);
        $passNewEncrypt = Crypt_core::encrypt($passwordNew);
        $query = "update p10p_users SET password='$passNewEncrypt',activated=1 where id_user=$idUser";
        return $this->db->executeQuery($query);
    }

    function recuperateUser($email) {
        $this->Setkey($this->key);
        $newPass = $this->getRandomPass();
        $newPassEncrypt = Crypt_core::encrypt($newPass);
        $emailEncrypt = Crypt_core::encrypt($email);
        $query = "update p10p_users set password='$newPassEncrypt',activated=0 where email='$emailEncrypt'";
        return array($this->db->executeQuery($query), $newPass);
    }

    function sendEmail($email, $subject, $msgEmail, $name) {
        $headers = "To: $name <$email>" . "\r\n";
        $headers .="From: Admin <no-reply@web.com>" . "\r\n";
        $headers .='MIME-Version: 1.0' . "\r\n";
        $headers .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $msgOk = "<table style='border: 0'><tr><td><img src='../../site_media/img/icons/Logo/logo_pizarra_letras.png' alt='La pizarra Opositores'/></td></tr><tr><td>$msgEmail</td></tr></table>";
        return mail($email, $subject, $msgOk, $headers);
    }

    function getDeactivatedUser($username, $password) {
        $this->Setkey($this->key);
        $passEncrypt = Crypt_core::encrypt($password);
        $usernameEncrypt = Crypt_core::encrypt($username);
        $query = "select * from p10p_users where password='$passEncrypt' AND activated=0 AND username='$usernameEncrypt' OR email='$usernameEncrypt'";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function getUsers() {
        $query = "select *from p10p_users";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getUser($username) {
        $this->Setkey($this->key);
        $usernameEncrypt = Crypt_core::encrypt($username);
        $query = "select * from p10p_users where email='$usernameEncrypt' OR username='$usernameEncrypt'";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function delUser($id) {
        $query = "delete from p10p_users where id_user=$id";
        return $this->db->executeQuery($query);
    }

    function updateUserRole($role, $id) {
        $query = "update p10p_users set type=$role where id_user=$id";
        return $this->db->executeQuery($query);
    }

    function adminUpdateStatusUser($status, $id) {
        $query = "update p10p_users set activated=$status where id_user=$id";
        return $this->db->executeQuery($query);
    }

    function adminActivationAccess($email) {
        $this->Setkey($this->key);
        $emailEncrypt = Crypt_core::encrypt($email);
        return $emailEncrypt;
    }

    function VerifyUserEmail($email) {
        $this->Setkey($this->key);
        $emailEncrypt = Crypt_core::encrypt($email);
        $query = "select * from p10p_users where email='$emailEncrypt' OR username='$emailEncrypt'";
        $resultArray = $this->db->executeSelectQuery($query);
        if (count($resultArray) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function exitSession() {
        return session_destroy();
    }

    function verifySession($nameSession) {
        session_start();
        if (isset($_SESSION[$nameSession])) {
            return true;
        } else {
            return false;
        }
    }

    function protectPage() {
        if (!$this->verifySession('user')) {
            $title = "Admin Platform";
            header("location: index.php");
        } else {
            $user = $this->getUser($_SESSION['user']);
            $title = "Hello, " . $user->getUsername() . "!";
        }
        return $title;
    }

    function saveSession($nameSession, $data) {
        $_SESSION[$nameSession] = $data;
    }

    function getRandomPass() {
        $pattern = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789?=/%&@¿?{}*";
        $randomPass = "";
        for ($i = 0; $i < 8; $i++) {
            $pos = rand(0, strlen($pattern) - 1);
            $randomPass .= $pattern[$pos];
        }
        return $randomPass;
    }

    //Functions to return single object or array object
    //==========================================================
    function returnObject($resultArray) {
        foreach ($resultArray as $object) {
            extract($object);
            $this->Setkey($this->key);
            $usernameOk = Crypt_core::decrypt($username);
            $emailOk = Crypt_core::decrypt($email);
            return new User($id_user, $usernameOk, $emailOk, $password, $type, $activated);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $this->Setkey($this->key);
            $usernameOk = Crypt_core::decrypt($username);
            $emailOk = Crypt_core::decrypt($email);
            $objectArray [] = new User($id_user, $usernameOk, $emailOk, $password, $type, $activated);
        }
        return $objectArray;
    }

}
