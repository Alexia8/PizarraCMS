<?php
/**
 * Description of Main Class global class that includes all models and initializes all controllers to be used in Views, all variable used in filters and activates user session
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
//include all controller classes
//=====================
include '../Controller/DB_core.php';
include '../Controller/User_core.php';
include '../Controller/Academy_core.php';
include '../Controller/Course_core.php';
include '../Controller/Crypt_core.php';
include '../Controller/Group_core.php';
include '../Controller/Student_core.php';
include '../Controller/Payment_core.php';
include '../Controller/Refund_core.php';
include '../Controller/Table_core.php';
include '../Controller/Teacher_core.php';
include '../Controller/Stat_core.php';
include '../Controller/TotalStat_core.php';


//Include all model classes
//=========================
include '../Model/Academy.php';
include '../Model/Course.php';
include '../Model/Group.php';
include '../Model/Payment.php';
include '../Model/Refund.php';
include '../Model/Stat.php';
include '../Model/TotalStat.php';
include '../Model/Student.php';
include '../Model/Teacher.php';
include '../Model/User.php';

//Innitialize Controller objects to acces them in Views
//==================================
$userController = new User_core();
$academyController = new Academy_core();
$courseController = new Course_core();
$groupController = new Group_core();
$studentController = new Student_core();
$paymentController = new Payment_core();
$refundController = new Refund_core();
$tableController = new Table_core();
$teacherController = new Teacher_core();
$statController = new Stat_core();
$totalStatController = new TotalStat_core();

//Initialize user if session started
//===========================
if ($title == "" || isset($_SESSION['user'])) {
    $title = $userController->protectPage();
    $user = $userController->getUser($_SESSION['user']);
}

//include message repository
//==========================================
include '../inc/repository.php';

//initilialize variables for filters search history
//==================================
$groupsComboC = "";
$stageCombo = "";
$coursesCombo = "";
$coursesComboC = "";
$sedesCombo = "";
$daysCombo = "";
$groupCombo = "";
$sedesComboC = "";
$orderCombo = "";
$teachersCombo = "";
$typeCombo = "";
$orderClass = false;
$payClass = false;
$teachClass = false;
$limitCombo = 10;
$limits = array(5, 10, 20, 30, 50, 100, 200, 500);
$intervalCombo = 1;
$intervals = array(1, 3, 9, 18, 27, 36, 45, 54, 63, 72, 100);

class Main {

    //db protected atribute accesible to controller classes that extend from main
    protected $db;

    //constructor sets key and connects
    function __construct() {
        include '../inc/connect.php';
        $this->db = new DB_core($host, $user, $password, $database);
    }

    //cleans all text inputs from forms
    function cleanInput($input) {
        $pattern = array('Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y');
        return ucwords(mb_strtolower(strtr($input, $pattern)));
    }

    //set key for encryption
    function Setkey($input) {
        $pattern = array('a' => '4', 'A' => '4', 'i' => '1', 'I' => '1', 'o' => '0', 'O' => '0', 'u' => '2', 'U' => '2', 'E' => '3', 'e' => '3', 'G' => '7', 'g' => '7', 's' => '5', 'S' => '5', '4' => 'a', '1' => 'i', '0' => 'O', '2' => 'u', '3' => 'E', '7' => 'G', '5' => 'S');
        new Crypt_core((strtr("$" . $input . "*", $pattern)));
    }

}
