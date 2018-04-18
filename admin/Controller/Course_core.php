<?php

/**
 * Description of Course_core Controller class that obtains all courses in a specific academy, by name, by id and all courses in table.
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Course_core extends Main {

    function getAcademyCourses($id) {
        $query = "select distinct id_course, course_name,start_date,end_date from p10p_courses natural join p10p_groups where p10p_groups.id_academy=$id";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getCourses() {
        $query = "select * from p10p_courses";
        $resultArrays = $this->db->executeSelectQuery($query);
        return $this->fillObjectArray($resultArrays);
    }

    function getCourse($id) {
        $query = "select * from p10p_courses where id_course=$id";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function getCourseByName($name) {
        $nameOk = $this->cleanInput($name);
        $query = "select * from p10p_courses where course_name='$nameOk'";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    function newCourse($course, $startDate, $endDate, $id, $operation) {
        $courseOk = $this->cleanInput($course);
        $repeatQ = "select * from p10p_courses where course_name='$courseOk' AND start_date='$startDate' AND end_date='$endDate'";
        $result = $this->db->executeSelectQuery($repeatQ);
        if (count($result) > 0) {
            return array(false, 1);
        } else {
            switch ($operation) {
                case 0:
                    $query = "insert into p10p_courses values (NULL,'$courseOk','$startDate','$endDate')";
                    break;
                case 1:
                    $query = "update p10p_courses SET course_name='$courseOk', start_date='$startDate', end_date='$endDate' where id_course=$id";
                    break;
            }
            if ($this->db->executeQuery($query)) {
                return array(true, 0);
            } else {
                return array(false, 2);
            }
        }
    }

    function delCourse($id) {
        $query = "delete from p10p_courses where id_course=$id";
        return $this->db->executeQuery($query);
    }

    //Functions to return single object or array object
    //==========================================================
    function returnObject($resultArray) {
        foreach ($resultArray as $object) {
            extract($object);
            return new Course($id_course, $course_name, $start_date, $end_date);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $objectArray [] = new Course($id_course, $course_name, $start_date, $end_date);
        }
        return $objectArray;
    }

}
