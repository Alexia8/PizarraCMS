<?php
/**
 * Description of Course Class represents all course info
 * @property INT $id_course Unique course identifier auto increment
 * @property STRING $course_name Course name
 * @property DATE $start_date Starting date of course
 * @property DATE $end_date Ending date of course
 *@copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Course {

    private $id_course, $course_name, $start_date, $end_date;
    
    function __construct($id_course, $course_name, $start_date, $end_date) {
        $this->id_course = $id_course;
        $this->course_name = $course_name;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    
    function getId_course() {
        return $this->id_course;
    }

    function getCourse_name() {
        return $this->course_name;
    }

    function getStart_date() {
        return $this->start_date;
    }

    function getEnd_date() {
        return $this->end_date;
    }
    
}
