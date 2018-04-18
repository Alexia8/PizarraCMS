<?php
/**
 * Description of Payment Class all payment info and student it belongs to. A student can have many payments.
 * @property INT $id_payment Unique payment identifier auto increment
 * @property STRING $method Type of payment (transfer, credit card, bill charged)
 * @property FLOAT $amount Quantity of payment
 * @property DATETIME $pay_date Date of payment
 * @property STRING $concept Concept of payment
 * @property INT $month Month payment belogns to (if it's a bill charged or paid lin delaye, pay date could be diffent than the month the payment belongs to), maximum control over delayed payments.
 * @property STRING $pay_stage The stage of payment (paid, not paid, pending, exent)
 * @property INT $id_student Foreign key to student id in Student class where it's related to
 *@copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Payment {
   
    private $id_payment, $method, $amount, $pay_date, $concept, $month, $pay_stage, $id_student;
    
    function __construct($id_payment, $method, $amount, $pay_date, $concept, $month, $pay_stage, $id_student) {
        $this->id_payment = $id_payment;
        $this->method = $method;
        $this->amount = $amount;
        $this->pay_date = $pay_date;
        $this->concept = $concept;
        $this->month = $month;
        $this->pay_stage = $pay_stage;
        $this->id_student = $id_student;
    }
    
    function getId_payment() {
        return $this->id_payment;
    }

    function getMethod() {
        return $this->method;
    }

    function getAmount() {
        return $this->amount;
    }

    function getPay_date() {
        return $this->pay_date;
    }

    function getConcept() {
        return $this->concept;
    }

    function getMonth() {
        return $this->month;
    }

    function getPay_stage() {
        return $this->pay_stage;
    }

    function getId_student() {
        return $this->id_student;
    }

    
}
