<?php

/**
 * Description of Student Class that represents all student info and the group he is enrolled, a student can only be  in one group.
 * @property INT $id_student Unique student identifier auto-increment
 * @property STRING $name Student name encrypt
 * @property STRING $surname Student surname encrypt
 * @property STRING $surname2 Student second surname encrypt
 * @property STRING $dni Student id number encrypt
 * @property STRING $email Student email encrypt
 * @property INT $tel_home Student home number 9 digits
 * @property INT $tel_mobile Student mobile number 9 digits
 * @property STRING $account Student bank account number encrypt
 * @property STRING $stage Student stage in academy (signed up is studying, enrolled jadmission stage, cancelled enrollment cancelled, finished once course completed)
 * @property STRING $discovery How the student discovered the academy (facebook, google, by a friend, ex student or other)
 * @property INT $newsletter Subscription for receiving newsletter
 * @property INT $ex_student 1 if former student
 * @property DATETIME $enrolled_date date when student applied for admission
 * @property DATETIME $signed_date date when student joined academy
 * @property DATETIME $cancelled_date date when student cancelled admision in academy
 * @property DATETIME $ended_date date when student finished course in academy
 * @property STRING $address Student address ecrypt
 * @property INT $postal_code Student postal code 5 digits
 * @property STRING $district Student district
 * @property INT $absents Student class absents
 * @property STRING $comments Student additional comments (when studet enrolles for a certain course in a certain academy it is assigned to a general group, group will be changed once student has passed the enrollment process and passes to signed up stage)
 * @property INT $id_group Foreign key to the group id where the student is related to in group class. 
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Student {

    private $id_student, $name, $surname, $surname2, $dni, $email, $tel_home, $tel_mobile, $account, $stage, $discovery, $newsletter, $ex_student, $enrolled_date, $signed_date, $cancelled_date, $ended_date, $address, $postal_code, $district, $absents, $comments, $id_group;

    function __construct($id_student, $name, $surname, $surname2, $dni, $email, $tel_home, $tel_mobile, $account, $stage, $discovery, $newsletter, $ex_student, $enrolled_date, $signed_date, $cancelled_date, $ended_date, $address, $postal_code, $district, $absents, $comments, $id_group) {
        $this->id_student = $id_student;
        $this->name = $name;
        $this->surname = $surname;
        $this->surname2 = $surname2;
        $this->dni = $dni;
        $this->email = $email;
        $this->tel_home = $tel_home;
        $this->tel_mobile = $tel_mobile;
        $this->account = $account;
        $this->stage = $stage;
        $this->discovery = $discovery;
        $this->newsletter = $newsletter;
        $this->ex_student = $ex_student;
        $this->enrolled_date = $enrolled_date;
        $this->signed_date = $signed_date;
        $this->cancelled_date = $cancelled_date;
        $this->ended_date = $ended_date;
        $this->address = $address;
        $this->postal_code = $postal_code;
        $this->district = $district;
        $this->absents = $absents;
        $this->comments = $comments;
        $this->id_group = $id_group;
    }

    function getId_student() {
        return $this->id_student;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getSurname2() {
        return $this->surname2;
    }

    function getDni() {
        return $this->dni;
    }

    function getEmail() {
        return $this->email;
    }

    function getTel_home() {
        return $this->tel_home;
    }

    function getTel_mobile() {
        return $this->tel_mobile;
    }

    function getAccount() {
        return $this->account;
    }

    function getStage() {
        return $this->stage;
    }

    function getDiscovery() {
        return $this->discovery;
    }

    function getNewsletter() {
        return $this->newsletter;
    }

    function getEx_student() {
        return $this->ex_student;
    }

    function getEnrolled_date() {
        return $this->enrolled_date;
    }

    function getSigned_date() {
        return $this->signed_date;
    }

    function getCancelled_date() {
        return $this->cancelled_date;
    }

    function getEnded_date() {
        return $this->ended_date;
    }

    function getAddress() {
        return $this->address;
    }

    function getPostal_code() {
        return $this->postal_code;
    }

    function getDistrict() {
        return $this->district;
    }

    function getAbsents() {
        return $this->absents;
    }

    function getComments() {
        return $this->comments;
    }

    function getId_group() {
        return $this->id_group;
    }

}
