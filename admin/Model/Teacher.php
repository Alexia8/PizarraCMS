<?php

/**
 * Description of Teacher Class represents all teacher info, a teacher can teach more than one group.
 * @property INT $id_teacher Unique teacher indentifier auto increment
 * @property STRING $t_name Teacher name encrypt
 * @property STRING $t_surname Teacher surname encrypt
 * @property STRING $t_surname2 Teacher second surname encrypt
 * @property STRING $t_email Teacher email encrypt
 * @property INT $tel teacher number 9 digits
 * @property STRING $t_stage teacher stage (alta, baja)
 * @property DATETIME $t_start date when teacher started in academy
 * @property DATETIME $t_end date when teacher stopped teaching in academy
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Teacher {

    private $id_teacher, $t_name, $t_surname, $t_surname2, $t_email, $tel, $t_stage, $t_start, $t_end;

    function __construct($id_teacher, $t_name, $t_surname, $t_surname2, $t_email, $tel, $t_stage, $t_start, $t_end) {
        $this->id_teacher = $id_teacher;
        $this->t_name = $t_name;
        $this->t_surname = $t_surname;
        $this->t_surname2 = $t_surname2;
        $this->t_email = $t_email;
        $this->tel = $tel;
        $this->t_stage = $t_stage;
        $this->t_start = $t_start;
        $this->t_end = $t_end;
    }

    function getId_teacher() {
        return $this->id_teacher;
    }

    function getT_name() {
        return $this->t_name;
    }

    function getT_surname() {
        return $this->t_surname;
    }

    function getT_surname2() {
        return $this->t_surname2;
    }

    function getT_email() {
        return $this->t_email;
    }

    function getTel() {
        return $this->tel;
    }

    function getT_stage() {
        return $this->t_stage;
    }

    function getT_start() {
        return $this->t_start;
    }

    function getT_end() {
        return $this->t_end;
    }

}
