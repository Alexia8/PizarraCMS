<?php

/**
 * Description of TotalStat Class represents all total statistics in the complete database
 * @property INT $id_totalStat Unique total_stat identifier auto increment
 * @property INT $total_cancelled Total students cancelled in DB
 * @property INT $total_enrolled Total students enrolled in DB
 * @property INT $total_signedUp Total students signed up in DB
 * @property INT $total_ended Total students ended course in DB
 * @property INT $total_onCampus Total students studying on campus in DB
 * @property INT $total_online Total students studying online in DB
 * @property INT $total_studentsDB ALL students in DB
 * @property INT $total_classrooms Total classrooms in DB
 * @property INT $total_teachers Total teachers in DB
 * @property FLOAT $total_invoiced Total amount invoiced in DB
 * @property FLOAT $total_refunds Total amount refunded in DB
 * @property FLOAT $total_pending Total amount pending in DB
 * @property INT $total_academies Total academies in DB
 * @property INT $total_courses Total courses in DB
 * @property INT $total_groups Total groups in DB
 * @property DATETIME $total_date Date when total stat has been set, necesary for maintaining a history in the system
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class TotalStat {

    private $id_totalStat, $total_cancelled, $total_enrolled, $total_signedUp,$total_ended, $total_onCampus, $total_online, $total_studentsDB, $total_classrooms, $total_teachers, $total_invoiced, $total_refunds, $total_pending, $total_academies, $total_courses, $total_groups, $total_date;
    
    function __construct($id_totalStat, $total_cancelled, $total_enrolled, $total_signedUp, $total_ended, $total_onCampus, $total_online, $total_studentsDB, $total_classrooms, $total_teachers, $total_invoiced, $total_refunds, $total_pending, $total_academies, $total_courses, $total_groups, $total_date) {
        $this->id_totalStat = $id_totalStat;
        $this->total_cancelled = $total_cancelled;
        $this->total_enrolled = $total_enrolled;
        $this->total_signedUp = $total_signedUp;
        $this->total_ended = $total_ended;
        $this->total_onCampus = $total_onCampus;
        $this->total_online = $total_online;
        $this->total_studentsDB = $total_studentsDB;
        $this->total_classrooms = $total_classrooms;
        $this->total_teachers = $total_teachers;
        $this->total_invoiced = $total_invoiced;
        $this->total_refunds = $total_refunds;
        $this->total_pending = $total_pending;
        $this->total_academies = $total_academies;
        $this->total_courses = $total_courses;
        $this->total_groups = $total_groups;
        $this->total_date = $total_date;
    }
    
    
    function getId_totalStat() {
        return $this->id_totalStat;
    }

    function getTotal_cancelled() {
        return $this->total_cancelled;
    }

    function getTotal_enrolled() {
        return $this->total_enrolled;
    }

    function getTotal_signedUp() {
        return $this->total_signedUp;
    }

    function getTotal_ended() {
        return $this->total_ended;
    }

    function getTotal_onCampus() {
        return $this->total_onCampus;
    }

    function getTotal_online() {
        return $this->total_online;
    }

    function getTotal_studentsDB() {
        return $this->total_studentsDB;
    }

    function getTotal_classrooms() {
        return $this->total_classrooms;
    }

    function getTotal_teachers() {
        return $this->total_teachers;
    }

    function getTotal_invoiced() {
        return $this->total_invoiced;
    }

    function getTotal_refunds() {
        return $this->total_refunds;
    }

    function getTotal_pending() {
        return $this->total_pending;
    }

    function getTotal_academies() {
        return $this->total_academies;
    }

    function getTotal_courses() {
        return $this->total_courses;
    }

    function getTotal_groups() {
        return $this->total_groups;
    }

    function getTotal_date() {
        return $this->total_date;
    }




}
