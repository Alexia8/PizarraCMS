<?php

/**
 * Description of Payment_core Controller Class that represents all payments info and to whom it belongs to
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Payment_core extends Main {

    function getAllPayments($stage, $order, $limit, $interval) {
        $query = "select * from p10p_payments natural join p10p_students where p10p_payments.pay_date>DATE_SUB(NOW(), INTERVAL $interval MONTH) AND p10p_students.stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAllNotPaid($stage, $order, $limit) {
        $query = "select p10p_payments.*, p10p_students.* from p10p_students left join p10p_payments on p10p_students.id_student = p10p_payments.id_student WHERE p10p_payments.id_student IS NULL having p10p_students.stage='$stage' order by p10p_students.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAllPaymentStudent($id) {
        $query = "select * from p10p_payments where id_student=$id order by pay_date";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getPaymentColumns() {
        $query = "show columns from p10p_payments";
        return $this->db->executeSelectQuery($query);
    }

    function getPaymentSingleFilter($field, $id, $stage, $order, $limit, $interval) {
        $query = "select * from p10p_payments natural join p10p_students natural join p10p_groups where pay_date>DATE_SUB(NOW(), INTERVAL $interval MONTH) AND p10p_groups.$field='$id'  having p10p_students.stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getPaymentDoubleFilter($field, $id1, $field2, $id2, $stage, $order, $limit, $interval) {
        $query = "select * from p10p_payments natural join p10p_students natural join p10p_groups where pay_date>DATE_SUB(NOW(), INTERVAL $interval MONTH) AND p10p_groups.$field='$id1' AND p10p_groups.$field2='$id2' having p10p_students.stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getPaymentTripleFilter($field, $id1, $field2, $id2, $field3, $id3, $stage, $order, $limit, $interval) {
        $query = "select * from p10p_payments natural join p10p_students natural join p10p_groups where pay_date>DATE_SUB(NOW(), INTERVAL $interval MONTH) AND p10p_groups.$field='$id1' AND p10p_groups.$field2='$id2' AND p10p_groups.$field3='$id3' having p10p_students.stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getPaymentFullFilter($ida, $idc, $day, $group, $stage, $order, $limit, $interval) {
        $query = "select * from p10p_payments natural join p10p_students natural join p10p_groups where pay_date>DATE_SUB(NOW(), INTERVAL $interval MONTH) AND p10p_groups.id_course=$idc AND p10p_groups.id_academy=$ida AND p10p_groups.day='$day' AND p10p_groups.group='$group' having p10p_students.stage='$stage' order by $order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAllNotPaidSingleFilter($field, $id, $stage, $order, $limit) {
        $query = "select p10p_payments.*, p10p_students.* from p10p_students left join p10p_payments on p10p_students.id_student = p10p_payments.id_student natural join p10p_groups WHERE p10p_payments.id_student IS NULL AND p10p_groups.$field='$id' having p10p_students.stage='$stage' order by p10p_students.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAllNotPaidDoubleFilter($field, $id, $field2, $id2, $stage, $order, $limit) {
        $query = "select p10p_payments.*, p10p_students.* from p10p_students left join p10p_payments on p10p_students.id_student = p10p_payments.id_student natural join p10p_groups WHERE p10p_payments.id_student IS NULL AND p10p_groups.$field='$id' AND p10p_groups.$field2='$id2' having p10p_students.stage='$stage' order by p10p_students.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAllNotPaidTripleFilter($field, $id, $field2, $id2, $field3, $id3, $stage, $order, $limit) {
        $query = "select p10p_payments.*, p10p_students.* from p10p_students left join p10p_payments on p10p_students.id_student = p10p_payments.id_student natural join p10p_groups WHERE p10p_payments.id_student IS NULL AND  p10p_groups.$field='$id' AND p10p_groups.$field2='$id2' AND p10p_groups.$field3='$id3'  having p10p_students.stage='$stage' order by p10p_students.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getAllNotPaidFullFilter($ida, $idc, $day, $group, $stage, $order, $limit) {
        $query = "select p10p_payments.*, p10p_students.* from p10p_students left join p10p_payments on p10p_students.id_student = p10p_payments.id_student  natural join p10p_groups WHERE p10p_payments.id_student IS NULL AND p10p_groups.id_course=$idc AND p10p_groups.id_academy=$ida AND p10p_groups.day='$day' AND p10p_groups.group='$group' having p10p_students.stage='$stage' order by p10p_students.$order LIMIT $limit";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function newPayment($method, $quantity, $concept, $month, $stage, $id_student, $idGroup, $id_payment, $operation) {
        $statController = new Stat_Core();
        $totalStatController = new TotalStat_Core();
        $repeatQ = "select * from p10p_payments where month='$month' and concept='$concept' having id_student=$id_student";
        $result = $this->db->executeSelectQuery($repeatQ);
        if (count($result) > 0) {
            return array(false, 1);
        } else {
            switch ($operation) {
                case 0:
                    $query = "insert into p10p_payments values(NULL,'$method',$quantity,NOW(),'$concept','$month','$stage',$id_student)";
                    break;
                case 1:
                    $query = "update p10p_payments set method='$method',amount=$quantity,concept='$concept', month='$month', stage='$stage' where id_payment=$id_payment";
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

    function delPayment($id, $idGroup) {
        $statController = new Stat_core();
        $totalStatController = new TotalStat_Core();
        $query = "delete from p10p_payments where id_payment=$id";
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

    function refPayment($concept, $id, $idGroup) {
        $statController = new Stat_core();
        $totalStatController = new TotalStat_Core();
        $query = "update p10p_payments SET pay_stage='Devolucion' where id_payment=$id";
        if ($this->db->executeQuery($query)) {
            $queryIn = "insert into p10p_refunds values(NULL,NOW(),'$concept',$id)";
            if ($this->db->executeQuery($queryIn)) {
                if ($statController->insertStatByGroup($idGroup)) {
                    if ($totalStatController->insertTotalStat()) {
                        return true;
                    }
                }
            } else {
                return false;
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
            return new Payment($id_payment, $method, $amount, $pay_date, $concept, $month, $pay_stage, $id_student);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $objectArray [] = new Payment($id_payment, $method, $amount, $pay_date, $concept, $month, $pay_stage, $id_student);
        }
        return $objectArray;
    }

}
