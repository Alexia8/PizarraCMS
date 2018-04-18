<?php
$title = "";
include '../Controller/Main.php';
if ($userController->exitSession()) {
    header("location: " . ROOT_HOME);
} else {
    header("location: " . ROOT_SERVER . "/404.php");
}