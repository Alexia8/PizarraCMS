<?php
/**
 * Description of Group Class represents all group info and to which academy and course it is related to. Also shows teacher in group
 * @property INT $id_group Unique group identifier auto increment
 * @property STRING $type What type of group it is (online or on campus)
 * @property STRING $group Letter of group
 * @property STRING $day The day the group belongs to
 * @property INT $id_teacher Foreign key to id in Teacher class, shows teacher in group
 * @property INT $id_course Foreign key to id in Course class, shows course group is in
 * @property INT $id_academy Foreign key to id in Academy class, shows academy group is in
 *@copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Group {
   
    private $id_group, $type, $group, $day, $id_teacher, $id_course, $id_academy;
    
 
    function __construct($id_group, $type, $group, $day, $id_teacher, $id_course, $id_academy) {
        $this->id_group = $id_group;
        $this->type = $type;
        $this->group = $group;
        $this->day = $day;
        $this->id_teacher = $id_teacher;
        $this->id_course = $id_course;
        $this->id_academy = $id_academy;
    }
    
    function getId_group() {
        return $this->id_group;
    }

    function getType() {
        return $this->type;
    }

    function getGroup() {
        return $this->group;
    }

    function getDay() {
        return $this->day;
    }

    function getId_teacher() {
        return $this->id_teacher;
    }

    function getId_course() {
        return $this->id_course;
    }

    function getId_academy() {
        return $this->id_academy;
    }



    
}
