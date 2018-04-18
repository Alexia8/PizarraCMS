<?php

/**
 * Description of TotalStat_core Controller Class that inserts and receives TOTAL stats of DB
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class TotalStat_core extends Main {

    function getTotalStat() {
        $query = "select * from p10p_totalstats order by total_date DESC limit 1";
        return $this->db->executeSelectQuery($query);
    }

    function insertTotalStat() {
        $query1 = "SELECT count(id_student) as count FROM p10p_students WHERE stage = 'Alta'";
        $query2 = "SELECT count(id_student) as count FROM p10p_students WHERE stage='Inscrito'";
        $query3 = "SELECT count(id_student) as count FROM p10p_students WHERE stage='Baja'";
        $query4 = "SELECT sum(amount) as count FROM p10p_payments WHERE pay_stage='Pagado'";
        $query5 = "SELECT sum(amount) as count FROM p10p_payments WHERE pay_stage='Devolucion'";
        $query6 = "SELECT count(id_student) as count FROM p10p_students NATURAL JOIN p10p_groups WHERE type='Presencial'";
        $query7 = "SELECT count(id_student) as count FROM p10p_students NATURAL JOIN p10p_groups WHERE type='Online'";
        $query8 = "SELECT count(id_student) as count FROM p10p_students";
        $query9 = "SELECT count(id_student) as count FROM p10p_students WHERE stage='Finalizado'";
        $query10 = "SELECT count(id_group) as count FROM p10p_groups where type NOT IN ('General')";
        $query11 = "SELECT count(id_teacher) as count FROM p10p_teachers WHERE t_stage='Alta'";
        $query12 = "SELECT sum(amount) as count FROM p10p_payments WHERE pay_stage='Pendiente'";
        $query13 = "SELECT count(id_academy) as count FROM p10p_academies";
        $query14 = "SELECT count(id_course) as count FROM p10p_courses";
        $query15 = "SELECT count(id_group) as count FROM p10p_groups";
        $totalStudents = $this->db->executeSelectQuery($query1);
        $totalEnrolled = $this->db->executeSelectQuery($query2);
        $totalCancelled = $this->db->executeSelectQuery($query3);
        $totalInvoiced = $this->db->executeSelectQuery($query4);
        $totalRefunded = $this->db->executeSelectQuery($query5);
        $totalCampus = $this->db->executeSelectQuery($query6);
        $totalOnline = $this->db->executeSelectQuery($query7);
        $totalDB = $this->db->executeSelectQuery($query8);
        $totalEnded = $this->db->executeSelectQuery($query9);
        $totalClass = $this->db->executeSelectQuery($query10);
        $totalTeach = $this->db->executeSelectQuery($query11);
        $totalPending = $this->db->executeSelectQuery($query12);
        $totalAcademies = $this->db->executeSelectQuery($query13);
        $totalCourses = $this->db->executeSelectQuery($query14);
        $totalGroups = $this->db->executeSelectQuery($query15);
        $s = $totalStudents[0]['count'];
        $e = $totalEnrolled[0]['count'];
        $c = $totalCancelled[0]['count'];
        $i = $totalInvoiced[0]['count'];
        $r = $totalRefunded[0]['count'];
        $en = $totalEnded[0]['count'];
        $oc = $totalCampus[0]['count'];
        $o = $totalOnline[0]['count'];
        $t = $totalDB[0]['count'];
        $tc = $totalClass[0]['count'];
        $tt = $totalTeach[0]['count'];
        $tp = $totalPending[0]['count'];
        $ta = $totalAcademies[0]['count'];
        $tco = $totalCourses[0]['count'];
        $tg = $totalGroups[0]['count'];
        if ($i == NULL) {
            $i = 0.00;
        }
        if ($r == NULL) {
            $r = 0.00;
        }
        $query = "INSERT INTO p10p_totalstats values (null,$c,$e,$s,$en,$oc,$o,$t,$tc,$tt,$i,$r,$tp,$ta,$tco,$tg,now())";
        if ($this->db->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

}
