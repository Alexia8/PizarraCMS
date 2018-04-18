<?php

/**
 * Description of Stat Class represents all statistics related to the group it belongs to.
 * @property INT $id_stat Unique stat identifier auto increment
 * @property INT $total_students Total students in that group
 * @property INT $total_cancelled Total students cancelled from that group
 * @property INT $total_enrolled Total students enrolled but not signed in that group
 * @property FLOAT $total_invoiced Total invoiced in that group
 * @property FLOAT $total_refunded Total refuned in that group
 * @property DATETIME $date exact date of the stat insert (needed to keep history of all stats per month)
 * @property INT $id_group Foreign key to id in Group class to which it is related to.
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Stat {

    private $id_stat, $total_students, $total_cancelled, $total_enrolled, $total_invoiced, $total_refunded, $date, $id_group;

    function __construct($id_stat, $total_students, $total_cancelled, $total_enrolled, $total_invoiced, $total_refunded, $date, $id_group) {
        $this->id_stat = $id_stat;
        $this->total_students = $total_students;
        $this->total_cancelled = $total_cancelled;
        $this->total_enrolled = $total_enrolled;
        $this->total_invoiced = $total_invoiced;
        $this->total_refunded = $total_refunded;
        $this->date = $date;
        $this->id_group = $id_group;
    }

    function getId_stat() {
        return $this->id_stat;
    }

    function getTotal_students() {
        return $this->total_students;
    }

    function getTotal_cancelled() {
        return $this->total_cancelled;
    }

    function getTotal_enrolled() {
        return $this->total_enrolled;
    }

    function getTotal_invoiced() {
        return $this->total_invoiced;
    }

    function getTotal_refunded() {
        return $this->total_refunded;
    }

    function getDate() {
        return $this->date;
    }

    function getId_group() {
        return $this->id_group;
    }

}
