<?php
/**
 * Description of Refund Class represents al refund info and payment id it belongs to, one refund belongs to one payment
 * @property INT $id_refund Unique refund identifier auto increment
 * @property DATETIME $ref_date Date of refund
 * @property STRING $ref_concept Concept of refund (reason payments has been refunded)
 * @property INT $id_payment Foreing key to id in Payment class referenced the payment that has been refunded
 *@copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Refund {
  
    private $id_refund, $ref_date, $ref_concept, $id_payment;
    
    function __construct($id_refund, $ref_date, $ref_concept, $payment_id) {
        $this->id_refund = $id_refund;
        $this->ref_date = $ref_date;
        $this->ref_concept = $ref_concept;
        $this->id_payment = $payment_id;
    }
    
    function getId_refund() {
        return $this->id_refund;
    }

    function getRef_date() {
        return $this->ref_date;
    }

    function getRef_concept() {
        return $this->ref_concept;
    }

    function getPayment_id() {
        return $this->id_payment;
    }    
}
