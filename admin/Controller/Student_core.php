<?php

/**
 * Description of Student_core Controller class that obtains all student info inside received group.
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Student_core extends Main {

    private $key = "Pizarra_Student";

    function getStudent($id) {
        $query = "select * from p10p_students natural join p10p_academies natural join p10p_courses natural join p10p_groups where p10p_students.id_student=$id";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function getStudentsByGroup($groupId) {
        $query = "select * from p10p_students where id_group=$groupId AND stage='Alta'";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAllStudentColumns() {
        $query = "Show columns from p10p_students";
        return $this->db->executeSelectQuery($query);
    }

    function getAllStudentStages() {
        $query = "select distinct stage from p10p_students";
        return $this->db->executeSelectQuery($query);
    }

    function getStudentStage($stage, $order, $limit) {
        $query = "select * from p10p_students where stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getStudentSingleFilter($field, $id, $stage, $order, $limit) {
        $query = "select * from p10p_students natural join p10p_groups where p10p_groups.$field='$id' group by p10p_students.id_student having stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getStudentDoubleFilter($field, $id1, $field2, $id2, $stage, $order, $limit) {
        $query = "select * from p10p_students natural join p10p_groups where p10p_groups.$field='$id1' AND p10p_groups.$field2='$id2' group by p10p_students.id_student having stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getStudentTripleFilter($field, $id1, $field2, $id2, $field3, $id3, $stage, $order, $limit) {
        $query = "select * from p10p_students natural join p10p_groups where p10p_groups.$field='$id1' AND p10p_groups.$field2='$id2' AND p10p_groups.$field3='$id3' group by p10p_students.id_student having stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getStudentFullFilter($ida, $idc, $day, $group, $stage, $order, $limit) {
        $query = "select * from p10p_students natural join p10p_groups where p10p_groups.id_academy=$ida AND p10p_groups.id_course=$idc AND p10p_groups.day='$day' AND p10p_groups.group='$group' group by p10p_students.id_student having stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function searchStudent($search, $value) {
        $this->Setkey($this->key);
        switch ($search) {
            case 'email':
                $valueOk = Crypt_core::encrypt(mb_strtolower($this->cleanInput($value)));
                break;
            case 'dni':
            case 'account':
                $valueOk = Crypt_core::encrypt(mb_strtoupper($this->cleanInput($value)));
                break;
            default:
                $valueOk = $this->cleanInput($value);
        }
        $query = "select * from p10p_students where $search='$valueOk'";
        return $this->db->executeSelectQuery($query);
    }

    function searchStudentByName($name, $surname, $surname2) {
        $this->Setkey($this->key);
        $nameCrypt = Crypt_core::encrypt($this->cleanInput($name));
        $surnameCrypt = Crypt_core::encrypt($this->cleanInput($surname));
        $surname2Crypt = Crypt_core::encrypt($this->cleanInput($surname2));
        $query = "select * from p10p_students where name='$nameCrypt' AND surname='$surnameCrypt' AND surname2='$surname2Crypt'";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function newStudent($name, $surname, $surname2, $DNI, $email, $tel_home, $tel_mobile, $account, $stage, $discovery, $newsletter, $exstudent, $address, $ps, $district, $absents, $comments, $idGroup, $operation, $id = "") {
        $statController = new Stat_Core();
        $totalStatController = new TotalStat_Core();
        $this->Setkey($this->key);
        $stageOk = $this->cleanInput($stage);
        $discoveryOk = $this->cleanInput($discovery);
        $districtOk = $this->cleanInput($district);
        $nameCrypt = Crypt_core::encrypt($this->cleanInput($name));
        $surnameCrypt = Crypt_core::encrypt($this->cleanInput($surname));
        $surname2Crypt = Crypt_core::encrypt($this->cleanInput($surname2));
        $dniCrypt = Crypt_core::encrypt(mb_strtoupper($this->cleanInput($DNI)));
        $emailCrypt = Crypt_core::encrypt(mb_strtolower($this->cleanInput($email)));
        $accountCrypt = Crypt_core::encrypt(mb_strtoupper($this->cleanInput($account)));
        $addressCrypt = Crypt_core::encrypt($this->cleanInput($address));
        $repeatQ = "select * from p10p_students where dni='$dniCrypt' XOR email='$emailCrypt'";
        $result = $this->db->executeSelectQuery($repeatQ);
        if (count($result) > 0) {
            return array(false, 1);
        } else {
            switch ($operation) {
                case 0:
                    $query = "insert into p10p_students values(NULL,'$nameCrypt','$surnameCrypt',' $surname2Crypt','$dniCrypt','$emailCrypt',$tel_home,$tel_mobile,'$accountCrypt','$stageOk','$discoveryOk',$newsletter,$exstudent,NOW(),NOW(),NOW(),NOW(),'$addressCrypt',$ps,'$districtOk',$absents,'$comments',$idGroup)";
                    break;
                case 1:
                    $query = "update p10p_students SET name='$nameCrypt',surname='$surnameCrypt',surname2='$surname2Crypt',tel_home=$tel_home,tel_mobile=$tel_mobile,account='$accountCrypt',email='$emailCrypt',dni='$dniCrypt',stage='$stageOk',discovery='$discoveryOk',newsletter=$newsletter,ex_student=$exstudent,address='$addressCrypt',postal_code=$ps,district='$districtOk',absents=$absents,comments='$comments',id_group=$idGroup where id_student=$id";
                    break;
            }
            if ($this->db->executeQuery($query)) {
                if ($statController->insertStatByGroup($idGroup)) {
                    if ($totalStatController->insertTotalStat()) {
                        return array(true, 0);
                    }
                }
            } else {
                return array(false, 2);
            }
        }
    }

    function cancelStudent($id, $idGroup) {
        $statController = new Stat_Core();
        $totalStatController = new TotalStat_Core();
        $query = "update p10p_students set p10p_students.stage='Baja',cancelled_date=now() where p10p_students.id_student=$id";
        if ($this->db->executeQuery($query)) {
            if ($statController->insertStatByGroup($idGroup)) {
                if ($totalStatController->insertTotalStat()) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    function signStudent($id, $idGroup) {
        $statController = new Stat_Core();
        $totalStatController = new TotalStat_Core();
        $query = "update p10p_students set p10p_students.stage='Alta',signed_date=now() where p10p_students.id_student=$id";
        if ($this->db->executeQuery($query)) {
            if ($statController->insertStatByGroup($idGroup)) {
                if ($totalStatController->insertTotalStat()) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    function endStudent($id, $idGroup) {
        $statController = new Stat_Core();
        $totalStatController = new TotalStat_Core();
        $query = "update p10p_students set p10p_students.stage='Finalizado',ended_date=now() where p10p_students.id_student=$id";
        if ($this->db->executeQuery($query)) {
            if ($statController->insertStatByGroup($idGroup)) {
                if ($totalStatController->insertTotalStat()) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    function modifyComment($comment, $id) {
        $query = "update p10p_students set p10p_students.comments='$comment' where p10p_students.id_student=$id";
        return $this->db->executeQuery($query);
    }

    function changeGroupStudent($idS, $idG) {
        $statController = new Stat_Core();
        $totalStatController = new TotalStat_Core();
        $query = "update p10p_students set id_group=$idG where id_student=$idS";
        if ($this->db->executeQuery($query)) {
            if ($statController->insertStatByGroup($idG)) {
                if ($totalStatController->insertTotalStat()) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    function getStudentsByTeacher($id, $type, $limit) {
        $query = "select * from p10p_students natural join p10p_groups inner join p10p_teachers on p10p_groups.id_teacher = p10p_teachers.id_teacher AND p10p_teachers.id_teacher=$id AND p10p_groups.type='$type' LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function delStudent($id,$idG) {
        $statController = new Stat_Core();
        $totalStatController = new TotalStat_Core();
        $query = "delete from p10p_students where id_student=$id";
        if ($this->db->executeQuery($query)) {
            if ($statController->insertStatByGroup($idG)) {
                if ($totalStatController->insertTotalStat()) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    //Functions to return single object or array object
    //==========================================================
    function returnObject($resultArray) {
        foreach ($resultArray as $object) {
            extract($object);
            $this->Setkey($this->key);
            $nameDecrypt = Crypt_core::decrypt($name);
            $surnameDecrypt = Crypt_core::decrypt($surname);
            $surname2Decrypt = Crypt_core::decrypt($surname2);
            $dniDecrypt = Crypt_core::decrypt($dni);
            $emailDecrypt = Crypt_core::decrypt($email);
            $addressDecrypt = Crypt_core::decrypt($address);
            $accountDecrypt = Crypt_core::decrypt($account);
            return new Student($id_student, $nameDecrypt, $surnameDecrypt, $surname2Decrypt, $dniDecrypt, $emailDecrypt, $tel_home, $tel_mobile, $accountDecrypt, $stage, $discovery, $newsletter, $ex_student, $enrolled_date, $signed_date, $cancelled_date, $ended_date, $addressDecrypt, $postal_code, $district, $absents, $comments, $id_group);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $this->Setkey($this->key);
            $nameDecrypt = Crypt_core::decrypt($name);
            $surnameDecrypt = Crypt_core::decrypt($surname);
            $surname2Decrypt = Crypt_core::decrypt($surname2);
            $dniDecrypt = Crypt_core::decrypt($dni);
            $emailDecrypt = Crypt_core::decrypt($email);
            $addressDecrypt = Crypt_core::decrypt($address);
            $accountDecrypt = Crypt_core::decrypt($account);
            $objectArray [] = new Student($id_student, $nameDecrypt, $surnameDecrypt, $surname2Decrypt, $dniDecrypt, $emailDecrypt, $tel_home, $tel_mobile, $accountDecrypt, $stage, $discovery, $newsletter, $ex_student, $enrolled_date, $signed_date, $cancelled_date, $ended_date, $addressDecrypt, $postal_code, $district, $absents, $comments, $id_group);
        }
        return $objectArray;
    }

}
