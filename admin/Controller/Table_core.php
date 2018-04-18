<?php

/**
 * Description of Table_core Controller class that controls all functionalities in tables. Filter search, change group, modify comments, sign up students, end students...
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Table_core extends Main {

    function filterSearchOk($sede, $course, $day, $group, $stage, $order, $id, $limit, $interval = "") {
        $studentController = new Student_core();
        $paymentController = new Payment_core();
        $groupController = new Group_core();
        $teacherController = new Teacher_core();
        $data = array('id_academy' => $sede, 'id_course' => $course, 'day' => $day, 'group' => $group);
        $dataKeys = array();
        $dataSearch = array();
        foreach ($data as $key => $search) {
            if ($search != -1) {
                $dataKeys[] = $key;
                $dataSearch[] = $search;
            }
        }
        if ($sede == -1 && $course == -1 && $day == -1 && $group == -1) {
            switch ($id) {
                case 1:
                    $result = $studentController->getStudentStage($stage, $order, $limit);
                    break;
                case 2:
                    $result = $paymentController->getAllPayments($stage, $order, $limit, $interval);
                    break;
                case 3:
                    $result = $paymentController->getAllNotPaid($stage, $order, $limit);
                    break;
                case 4:
                    $result = $groupController->getAllGroups($order, $limit);
                    break;
                case 5:
                    $result = $teacherController->getAllTeachers($order, $limit);
                    break;
            }
        } else if ($sede != -1 && $course != -1 && $day != -1 && $group != -1) {
            switch ($id) {
                case 1:
                    $result = $studentController->getStudentFullFilter($sede, $course, $day, $group, $stage, $order, $limit);
                    break;
                case 2:
                    $result = $paymentController->getPaymentFullFilter($sede, $course, $day, $group, $stage, $order, $limit, $interval);
                    break;
                case 3:
                    $result = $paymentController->getAllNotPaidFullFilter($sede, $course, $day, $group, $stage, $order, $limit);
                    break;
                case 4:
                    $result = $groupController->getFullGroupsFilter($sede, $course, $day, $group, $order, $limit);
                    break;
                case 5:
                    $result = $teacherController->getFullTeacherFilter($sede, $course, $day, $group, $order, $limit);
                    break;
            }
        } else if (($sede != -1 && $course != -1 && $day != -1) || ($group != -1 && $course != -1 && $day != -1) || ($sede != -1 && $day != -1 && $group != -1) || ($sede != -1 && $course != -1 && $group != -1)) {
            switch ($id) {
                case 1:
                    $result = $studentController->getStudentTripleFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $dataKeys[2], $dataSearch[2], $stage, $order, $limit);
                    break;
                case 2:
                    $result = $paymentController->getPaymentTripleFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $dataKeys[2], $dataSearch[2], $stage, $order, $limit, $interval);
                    break;
                case 3:
                    $result = $paymentController->getAllNotPaidTripleFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $dataKeys[2], $dataSearch[2], $stage, $order, $limit, $interval);
                    break;
                case 4:
                    $result = $groupController->getTripleGroupsFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $dataKeys[2], $dataSearch[2], $order, $limit);
                    break;
                case 5:
                    $result = $teacherController->getTeacherTripleFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $dataKeys[2], $dataSearch[2], $order, $limit);
                    break;
            }
        } else if (($sede != -1 && $course != -1) || ($day != -1 && $group != -1) || ($sede != -1 && $day != -1) || ($course != -1 && $day != -1) || ($sede != -1 && $group != -1) || ($course != -1 && $group != -1)) {
            switch ($id) {
                case 1:
                    $result = $studentController->getStudentDoubleFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $stage, $order, $limit);
                    break;
                case 2:
                    $result = $paymentController->getPaymentDoubleFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $stage, $order, $limit, $interval);
                    break;
                case 3:
                    $result = $paymentController->getAllNotPaidDoubleFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $stage, $order, $limit, $interval);
                    break;
                case 4:
                    $result = $groupController->getDoubleGroupsFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $order, $limit);
                    break;
                case 5:
                    $result = $teacherController->getTeacherDoubleFilter($dataKeys[0], $dataSearch[0], $dataKeys[1], $dataSearch[1], $order, $limit);
                    break;
            }
        } else if ($sede != -1 || $course != -1 || $day != -1 || $group != -1) {
            switch ($id) {
                case 1:
                    $result = $studentController->getStudentSingleFilter($dataKeys[0], $dataSearch[0], $stage, $order, $limit);
                    break;
                case 2:
                    $result = $paymentController->getPaymentSingleFilter($dataKeys[0], $dataSearch[0], $stage, $order, $limit, $interval);
                    break;
                case 3:
                    $result = $paymentController->getAllNotPaidSingleFilter($dataKeys[0], $dataSearch[0], $stage, $order, $limit, $interval);
                    break;
                case 4:
                    $result = $groupController->getSingleGroupsFilter($dataKeys[0], $dataSearch[0], $order, $limit);
                    break;
                case 5:
                    $result = $teacherController->getTeacherSingleFilter($dataKeys[0], $dataSearch[0], $order, $limit);
                    break;
            }
        }
        return $result;
    }

    function checkButtons($checkBoxForm, $idStu, $commentsUp, $group = "", $month = "", $concept = "", $quantity = "", $idGroup = "") {
        $studentController = new Student_core();
        $paymentController = new Payment_core();
        for ($i = 0; $i < count($idStu); $i++) {
            switch ($checkBoxForm) {
                case 'cancel':
                    $result = $studentController->cancelStudent($idStu[$i], $idGroup[$i]);
                    break;
                case 'sign':
                    $result = $studentController->signStudent($idStu[$i], $idGroup[$i]);
                    break;
                case 'edit':
                    $result = $studentController->modifyComment($commentsUp[$i], $idStu[$i]);
                    break;
                case 'end':
                    $result = $studentController->endStudent($idStu[$i], $idGroup[$i]);
                    break;
                case 'switch':
                    $result = $studentController->changeGroupStudent($idStu[$i], $group);
                    break;
                case 'addPay':
                    $result = $paymentController->newPayment('Domiciliacion', $quantity, $concept, $month, 'Pagado', $idStu[$i], $idGroup[$i], 0, 0);
                    break;
                default:
                    $result = false;
            }
        }
        return $result;
    }

}
