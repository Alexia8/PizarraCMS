<?php

/**
 * Description of Teacher_core Controller class that represents all teacher info, all students that belong to a certain teacher and quanity of cancelled and signed-up students every teacher has.
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Teacher_core extends Main {

    private $key = "Pizarra_Teacher";

    function getAllTeachers($order, $limit) {
         $this->Setkey($this->key);
        $nameCrypt = Crypt_core::encrypt($this->cleanInput('Sin'));
        $query = "select * from p10p_teachers where t_name not in('$nameCrypt') order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }
    
       function getTeachersActive($order) {
        $query = "select * from p10p_teachers where t_name not in('Sin') AND t_stage not in ('Baja') order by $order";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getTeacher($id) {
        $query = "select * from p10p_teachers where id_teacher=$id";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function getTeacherbyFullName($name, $surname, $surname2) {
        $query = "select * from p10p_teachers where t_name='$name' AND t_surname='$surname' AND t_surname2='$surname2'";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function getTeacherColumns() {
        $query = "show columns from p10p_teachers";
        return $this->db->executeSelectQuery($query);
    }

    function getTeacherSingleFilter($field, $id, $order, $limit) {
        $query = "select distinct id_teacher, t_name,t_surname,t_surname2,t_email,tel from p10p_teachers natural join p10p_groups where p10p_groups.$field='$id' having t_name not in ('Sin') order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getTeacherDoubleFilter($field, $id, $field2, $id2, $order, $limit) {
        $query = "select distinct id_teacher, t_name,t_surname,t_surname2,t_email,tel from p10p_teachers natural join p10p_groups where p10p_groups.$field='$id' AND p10p_groups.$field2='$id2' having t_name not in ('Sin') order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getTeacherTripleFilter($field, $id, $field2, $id2, $field3, $id3, $order, $limit) {
        $query = "select distinct id_teacher, t_name,t_surname,t_surname2,t_email,tel from p10p_teachers natural join p10p_groups where p10p_groups.$field='$id' AND p10p_groups.$field2='$id2' AND p10p_groups.$field3='$id3' having t_name not in ('Sin')  order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getFullTeacherFilter($ida, $idc, $day, $group, $order, $limit) {
        $query = "select * from p10p_teachers natural join p10p_groups where id_academy=$ida AND id_course=$idc AND p10p_groups.day='$day' AND p10p_groups.group='$group' having t_name not in ('Sin') order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function newTeacher($name, $surname, $surname2, $email, $tel_mobile, $stage, $operation, $id = " ") {
        $this->Setkey($this->key);
        $nameCrypt = Crypt_core::encrypt($this->cleanInput($name));
        $surnameCrypt = Crypt_core::encrypt($this->cleanInput($surname));
        $surname2Crypt = Crypt_core::encrypt($this->cleanInput($surname2));
        $emailCrypt = Crypt_core::encrypt(mb_strtolower($this->cleanInput($email)));
        $repeatQ = "select * from p10p_teachers where t_email='$emailCrypt' XOR tel=$tel_mobile";
        $result = $this->db->executeSelectQuery($repeatQ);
        if (count($result) > 0) {
            return array(false, 1);
        } else {
            switch ($operation) {
                case 0:
                    $query = "insert into p10p_teachers values(NULL,'$nameCrypt','$surnameCrypt','$surname2Crypt','$emailCrypt',$tel_mobile,'$stage',NOW(),'0000-00-00 00:00:00')";
                    break;
                case 1:
                    $query = "update p10p_teachers SET t_name='$nameCrypt', t_surname='$surnameCrypt', t_surname2='$surname2Crypt', t_email='$emailCrypt', tel=$tel_mobile,t_stage='$stage' where id_teacher=$id";
                    break;
            }
            if ($this->db->executeQuery($query)) {
                return array(true, 0);
            } else {
                return array(false, 2);
            }
        }
    }

    function delTeacher($id) {
        $query = "delete from p10p_teachers where id_teacher=$id";
        return $this->db->executeQuery($query);
    }

//Functions to return single object or array object
//==========================================================
    function returnObject($resultArray) {
        foreach ($resultArray as $object) {
            extract($object);
            $this->Setkey($this->key);
            $nameDecrypt = Crypt_core::decrypt($t_name);
            $surnameDecrypt = Crypt_core::decrypt($t_surname);
            $surname2Decrypt = Crypt_core::decrypt($t_surname2);
            $emailDecrypt = Crypt_core::decrypt($t_email);
            return new Teacher($id_teacher, $nameDecrypt, $surnameDecrypt, $surname2Decrypt, $emailDecrypt, $tel, $t_stage, $t_start, $t_end);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $this->Setkey($this->key);
            $nameDecrypt = Crypt_core::decrypt($t_name);
            $surnameDecrypt = Crypt_core::decrypt($t_surname);
            $surname2Decrypt = Crypt_core::decrypt($t_surname2);
            $emailDecrypt = Crypt_core::decrypt($t_email);
            $objectArray [] = new Teacher($id_teacher, $nameDecrypt, $surnameDecrypt, $surname2Decrypt, $emailDecrypt, $tel, $t_stage, $t_start, $t_end);
        }
        return $objectArray;
    }

}
