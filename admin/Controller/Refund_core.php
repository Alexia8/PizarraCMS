<?php

/**
 * Description of Refund_core Controller class that retrieves refund info
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Refund_core extends Main {

    function getRefundStudent($id) {
        $query = "select * from p10p_refunds where id_payment=$id";
        $resultArray = $this->db->executeSelectQuery($query);
        return $this->returnObject($resultArray);
    }

    //Functions to return single object or array object
    //==========================================================
    function returnObject($resultArray) {
        foreach ($resultArray as $object) {
            extract($object);
            return new Refund($id_refund, $ref_date, $ref_concept, $id_payment);
        }
    }

    function fillObjectArray($resultArrays) {
        $objectArray = array();
        foreach ($resultArrays as $object) {
            extract($object);
            $objectArray [] = new Refund($id_refund, $ref_date, $ref_concept, $id_payment);
        }
        return $objectArray;
    }

}
