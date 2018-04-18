<?php
/**
 * Description of Academy Class represents Academy location
 * @property INT $id_academy Unique academy identifier auto increment
 * @property STRING $location The location of the academy
 *@copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Academy {
    
    private $id_academy, $location;
    
    function __construct($id_academy, $location) {
        $this->id_academy = $id_academy;
        $this->location = $location;
    }
    
    function getId_academy() {
        return $this->id_academy;
    }

    function getLocation() {
        return $this->location;
    }
    
}
