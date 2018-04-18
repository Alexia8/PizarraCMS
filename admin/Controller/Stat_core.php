<?php

/**
 * Description of Stat_core Controller class that consults and inserts all the statistics by group, signed, enrolled, endend and cancelled students. Also recovers all amount invoiced and refunded by group and in total
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Stat_core extends Main {

    function getStatGroup($id) {
        $query = "select * from p10p_stats where id_group=$id order by date DESC limit 1";
        return $this->db->executeSelectQuery($query);
    }

    function insertStatByGroup($id) {
        $query1 = "SELECT count(id_student) as count FROM p10p_students WHERE stage = 'Alta' and id_group = $id";
        $query2 = "SELECT count(id_student) as count FROM p10p_students WHERE stage='Inscrito' and id_group = $id";
        $query3 = "SELECT count(id_student) as count FROM p10p_students WHERE stage='Baja' and id_group = $id";
        $query4 = "SELECT sum(amount) as count FROM p10p_payments NATURAL JOIN p10p_students WHERE pay_stage='Pagado' and id_group = $id";
        $query5 = "SELECT sum(amount) as count FROM p10p_payments NATURAL JOIN p10p_students WHERE pay_stage='Devolucion' and id_group = $id";
        $totalStudents = $this->db->executeSelectQuery($query1);
        $totalEnrolled = $this->db->executeSelectQuery($query2);
        $totalCancelled = $this->db->executeSelectQuery($query3);
        $totalInvoiced = $this->db->executeSelectQuery($query4);
        $totalRefunded = $this->db->executeSelectQuery($query5);
        $s = $totalStudents[0]['count'];
        $e = $totalEnrolled[0]['count'];
        $c = $totalCancelled[0]['count'];
        $i = $totalInvoiced[0]['count'];
        $r = $totalRefunded[0]['count'];
        if ($i == NULL) {
            $i = 0.00;
        }
        if ($r == NULL) {
            $r = 0.00;
        }
        $query = "INSERT INTO p10p_stats values (null,$s,$c,$e,$i,$r,now(),$id)";
        if ($this->db->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    //Functions to return single object or object array
    //==========================================================
    function returnObject($resultArray) {
        foreach ($resultArray as $object) {
            extract($object);
            return new Stat($id_stat, $total_students, $total_cancelled, $total_enrolled, $total_invoiced, $total_refunded, $date, $id_group);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $objectArray [] = new Stat($id_stat, $total_students, $total_cancelled, $total_enrolled, $total_invoiced, $total_refunded, $date, $id_group);
        }
        return $objectArray;
    }

}
