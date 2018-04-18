<?php

/**
 * Description of Json_core Controller class that retrieves a json_encode for the Api chart.js to create all charts in Statistics by group and total. Switches type received from ajax call in p10ptats_code
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
$title = "";
include '../Controller/Main.php';

if (isset($_POST['type'])) {
    extract($_POST);
    switch ($type) {
        case 'groups':
            $statGroup = $statController->getStatGroup($id_S);
            echo json_encode($statGroup);
            break;
        case 'total':
            $totalStat = $totalStatController->getTotalStat();
            echo json_encode($totalStat);
            break;
    }
}


    
