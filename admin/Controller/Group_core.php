<?php

/**
 * Description of Group_core Controller Class that obtains all groups
 *
 * @author AlexiaDura
 */
class Group_core extends Main {

    function getGroup($idG) {
        $query = "select * from p10p_groups where id_group=$idG";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function getGroups($ida, $idc) {
        $query = "select * from p10p_groups where id_course=$idc AND id_academy=$ida";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getDays() {
        $query = "select distinct day from p10p_groups order by day";
        return $this->db->executeSelectQuery($query);
    }

    function getGroupsL() {
        $query = "select distinct p10p_groups.group from p10p_groups";
        return $this->db->executeSelectQuery($query);
    }

    function getGroupsTotal() {
        $query = "select * from p10p_groups order by id_academy";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAllGroups($order, $limit) {
        $query = "select * from p10p_groups where type not in ('online') order by p10p_groups.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getSingleGroupsFilter($field, $id, $order, $limit) {
        $query = "select * from p10p_groups where p10p_groups.$field='$id' having type not in ('online') order by p10p_groups.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getDoubleGroupsFilter($field, $id, $field2, $id2, $order, $limit) {
        $query = "select * from p10p_groups where p10p_groups.$field='$id' AND p10p_groups.$field2='$id2' having type not in ('online') order by p10p_groups.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getTripleGroupsFilter($field, $id, $field2, $id2, $field3, $id3, $order, $limit) {
        $query = "select * from p10p_groups where p10p_groups.$field='$id' AND p10p_groups.$field2='$id2' AND p10p_groups.$field3='$id3' having type not in ('online') order by p10p_groups.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getFullGroupsFilter($ida, $idc, $day, $group, $order, $limit) {
        $query = "select * from p10p_groups where id_academy=$ida AND id_course=$idc AND p10p_groups.day='$day' AND p10p_groups.group='$group' having type not in ('online') order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function newGroup($type, $group, $day, $idT, $idC, $idA, $id, $operation) {
        $typeOk = $this->cleanInput($type);
        $groupOk = $this->cleanInput($group);
        $dayOk = $this->cleanInput($day);
        $repeatQ = "select * from p10p_groups where p10p_groups.type='$typeOk' AND p10p_groups.group='$groupOk' AND p10p_groups.day='$dayOk' AND p10p_groups.id_course=$idC AND p10p_groups.id_academy=$idA";
        $result = $this->db->executeSelectQuery($repeatQ);
        if (count($result) > 0) {
            return array(false, 1);
        } else {
            switch ($operation) {
                case 0:
                    $query = "insert into p10p_groups values (NULL,'$typeOk','$groupOk','$dayOk',$idT,$idC,$idA)";
                    break;
                case 1:
                    $query = "update p10p_groups SET p10p_groups.type='$typeOk', p10p_groups.group='$groupOk', p10p_groups.day='$dayOk' where p10p_groups.id_group=$id";
                    break;
            }
            if ($this->db->executeQuery($query)) {
                return array(true, 0);
            } else {
                return array(false, 2);
            }
        }
    }

    function delGroup($id) {
        $query = "delete from p10p_groups where id_group=$id";
        return $this->db->executeQuery($query);
    }

    function assignTeacher($idG, $idT) {
        $query = "Update p10p_groups set id_teacher=$idT where id_group=$idG";
        return $this->db->executeQuery($query);
    }

//Functions to return single object or array object
//==========================================================
    function returnObject($resultArray) {
        foreach ($resultArray as $object) {
            extract($object);
            return new Group($id_group, $type, $group, $day, $id_teacher, $id_course, $id_academy);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $objectArray [] = new Group($id_group, $type, $group, $day, $id_teacher, $id_course, $id_academy);
        }
        return $objectArray;
    }

}
