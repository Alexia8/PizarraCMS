<?php

/**
 * Description of Overview_core Controller Class that obtains all academies, by id, and academies not online.
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Academy_core extends Main {

    function getAcademies() {
        $query = "select * from p10p_academies";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAcademiesNo() {
        $query = "select * from p10p_academies where Location not in ('online')";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAcademy($id) {
        $query = "select * from p10p_academies where id_academy=$id";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function getAcademyColumns() {
        $query = "Show columns from p10p_academies";
        return $resultArrays = $this->db->executeSelectQuery($query);
    }

    function newAcademy($academy, $id, $operation) {
        $academyOk = $this->cleanInput($academy);
        $repeatQ = "select * from p10p_academies where location='$academyOk'";
        $result = $this->db->executeSelectQuery($repeatQ);
        if (count($result) > 0) {
            return array(false, 1);
        } else {
            switch ($operation) {
                case 0:
                    $query = "insert into p10p_academies values(NULL,'$academyOk')";
                    break;
                case 1:
                    $query = "update p10p_academies SET location='$academyOk' where id_academy=$id";
                    break;
            }
            if ($this->db->executeQuery($query)) {
                return array(true, 0);
            } else {
                return array(false, 2);
            }
        }
    }

    function delAcademy($id) {
        $query = "delete from p10p_academies where id_academy=$id";
        return $this->db->executeQuery($query);
    }

    //Functions to return single object or object array
    //==========================================================
    function returnObject($resultArray) {
        foreach ($resultArray as $object) {
            extract($object);
            return new Academy($id_academy, $location);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $objectArray [] = new Academy($id_academy, $location);
        }
        return $objectArray;
    }

}
