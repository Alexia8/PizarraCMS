<?php
$title = "";
include '../Controller/Main.php';
$months = array("Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto");
$msg = "";
$refund = "";
if (isset($_GET["i"])) {
    extract($_GET);
    $student = $studentController->getStudent($i);
    $group = $groupController->getGroup($student->getId_group());
    $course = $courseController->getCourse($group->getId_course());
    $academy = $academyController->getAcademy($group->getId_academy());
    $payments = $paymentController->getAllPaymentStudent($i);
} else {
    header("location: index.php");
}

if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 1) {
        $msg = DEL_MSG;
    }

    if ($_GET['msg'] == 3) {
        $msg = REFPAY_MSG;
    }

    if (isset($_GET['op']) == 2) {
        extract($_GET);
        $msg = $_GET['msg'];
    }
}

if (isset($_POST['formDelPay'])) {
    extract($_POST);
    if ($paymentController->delPayment($formDelPay, $student->getId_group())) {
        $id = $student->getId_student();
        header("location: profile.php?i=$id&msg=1");
    } else {
        $msg = ERROR_MSG;
    }
}

if (isset($_POST['formRefPay'])) {
    extract($_POST);
    if ($paymentController->refPayment($_POST['conceptRef'], $formRefPay, $student->getId_group())) {
        $id = $student->getId_student();
        header("location: profile.php?i=$id&msg=3");
    } else {
        $msg = ERROR_MSG;
    }
}
$direct = false;
include '../inc/header.php';
?>
<div id="main">
    <?php if ($user->getType() == 1 && $user->getActivated() == 1) { ?>
        <div id="menuS" onclick="openNav()"></div>
        <div id="menuSC" onclick="closeNav()"></div>
        <div id="mySidenav" class="sidenav">
            <a href="paymentsUp.php?idst=<?= $student->getId_student() ?>" class="topa">Añadir<br>Pago<div id="add"></div></a>
            <a href="studentUp.php?idst=<?= $student->getId_student() ?>">Actualizar<br>Alumno<div id="update"></div></a>
            <a onclick="if (!confirm('ELIMINAR Alumno: (<?= $student->getName() . " " . $student->getsurname() . " " . $student->getSurname2() ?>)?'))
                        return false" href="studentUp.php?idst=<?= $student->getId_student() ?>&d=1">Eliminar<br>Alumno<div id="delete"></div></a>
        </div>
    <?php } ?>
    <div class="wrapper">
        <a href="students.php?idg=<?= $student->getId_group() ?>" title="Volver atrás"><div class="back"></div></a>
        <section class="col col_1">
            <?php if ($msg != "") { ?>
                <p id="message"><?= $msg ?></p>
            <?php } ?>
        </section>
        <section id="contentStudent">
            <div class="col col_3">
                <h4><?= TITLE_PERSONAL ?></h4>
                <ul>
                    <li>
                        <div class="name"></div>  
                        <h5><?= $student->getName() . " " . $student->getsurname() ?></h5><h5><?= $student->getSurname2() ?></h5>
                    </li>
                    <li>
                        <div class="ID"></div>  
                        <h5><?= $student->getDni() ?></h5>
                    </li>
                    <li>
                        <div class="address"></div>  
                        <h5><?= $student->getAddress() . "<br>" . $student->getPostal_code() . " " . $student->getDistrict() ?></h5>
                    </li>
                    <li>
                        <div class="telG"></div>  
                        <h5><?= $student->getTel_mobile() ?></h5>
                    </li>
                    <li>
                        <div class="telH"></div>  
                        <h5><?= $student->getTel_home() ?></h5>
                    </li>

                    <li>
                        <div class="mail"></div>  
                        <h5><?= $student->getEmail() ?></h5>
                    </li>

                </ul>
            </div>
            <div class="col col_3">
                <h4><?= TITLE_ACADEMIC ?></h4>
                <ul><br>
                    <li>
                        <div class="groupIcon"></div>  
                        <h5><?= $group->getDay() . " " . $group->getGroup() ?></h5>
                    </li>
                    <li>
                        <div class="esp"></div>  
                        <h5><?= $course->getCourse_name() ?></h5>
                    </li>

                    <li>
                        <div class="sede"></div>  
                        <h5><?= $academy->getLocation() ?></h5>
                    </li>
                    <li>
                        <div class="type"></div>  
                        <h5><?= $group->getType() ?></h5>
                    </li>
                    <li>
                        <div class="date"></div>  
                        <h5><?= date("d-m-Y H:i", strtotime($student->getEnrolled_date())) ?></h5>
                    </li>

                    <li>
                        <div class="absents"></div>
                        <h5>Faltas: <?= $student->getAbsents() ?></h5><br>
                    </li>
                </ul>
            </div>
            <div class="col col_3">
                <h4><?= TITLE_OTHER ?></h4>
                <ul><br>
                    <li>
                        <div class="idStu"></div>  
                        <h5>ID: <?= $student->getId_student() ?></h5>
                    </li>
                    <li>
                        <div class="account"></div>  
                        <h5><?= $student->getAccount() ?></h5>
                    </li>

                    <li>
                        <div class="stage"></div>  

                        <?php if ($student->getStage() == 'Alta') { ?>
                            <h5><?= $student->getStage() . ": " . date("d-m-Y", strtotime($student->getSigned_date())) ?></h5>
                        <?php } ?>

                        <?php if ($student->getStage() == 'Inscrito') { ?>
                            <h5><?= $student->getStage() ?></h5>
                        <?php } ?>

                        <?php if ($student->getStage() == 'Baja') { ?>
                            <h5><?= $student->getStage() . ":  " . date("d-m-Y", strtotime($student->getCancelled_date())) ?></h5>
                        <?php } ?>

                        <?php if ($student->getStage() == 'Finalizado') { ?>
                            <h5><?= $student->getStage() . ":  " . date("d-m-Y", strtotime($student->getEnded_date())) ?></h5>
                        <?php } ?>

                    </li> 
                    <li>
                        <div class="discover"></div>  
                        <h5><?= $student->getDiscovery() ?></h5>
                    </li>
                    <li>
                        <div class="news"></div> 
                        <?php if ($student->getNewsletter() == 0) { ?>
                            <h5>Newsletter No</h5> 
                        <?php } else { ?>
                            <h5>Newsletter Yes</h5> 
                        <?php } ?>
                    </li>
                    <li>
                        <div class="exStudent"></div>  
                        <?php if ($student->getEx_student() == 0) { ?>
                            <h5>Alumno nuevo</h5> 
                        <?php } else { ?>
                            <h5>Ex-alumno </h5>
                        <?php } ?>
                        <br>
                    </li>
                </ul>
            </div>
        </section><br>
        <div class="col col_1 btnsProfile">
            <a href="#" onclick="openPayments()">Pagos</a>
            <a href="#" onclick="openComments()">Notas</a>
        </div>

    </div>

    <div id="stuComment" class="stuComments">
        <div id="closep" onclick="closeComments()"></div>
        <h3>Notas-> <?= $student->getName() . " " . $student->getSurname() . " " . $student->getSurname2() ?> </h3><br>
        <h4><?= $student->getComments() ?></h4>
    </div>

    <div id="stuPayments" class="stupays">
        <div class="wrapper">
            <div id="closep" onclick="closePayments()"></div>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formCheck">
                <h3>Pagos-> <?= $student->getName() . " " . $student->getSurname() . " " . $student->getSurname2() ?></h3>
                <table>
                    <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                        <th>X</th>
                        <th>Devolucion</th>
                    <?php } ?>
                    <th>Fecha Pago</th>
                    <th>Mes</th>
                    <th>Cantidad</th>
                    <th>Forma De Pago</th>
                    <th>Concepto</th>
                    <th>Estado</th>
                    <?php if (count($payments) > 0) { ?>
                        <?php foreach ($payments as $payment) { ?>
                            <?php for ($i = 0; $i < count($months); $i++) { ?>
                                <tr>
                                    <?php if ($months[$i] == $payment->getMonth()) { ?>
                                        <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                                            <td class="delInput"><p id="del"><input type="submit" value="<?= $payment->getId_payment() ?>" name="formDelPay" title="Eliminar pago"/></p></td>
                                            <?php if ($payment->getPay_stage() == "Pagado") { ?>
                                                <td>
                                                    <p id="refund">
                                                        <input type="text" name="conceptRef" placeholder="concepto*"/>
                                                        <input type="submit" value="<?= $payment->getId_payment() ?>" name="formRefPay" title="Devolver pago"/>
                                                    </p>
                                                </td>
                                                <?php
                                            } elseif ($payment->getPay_stage() == "Devolucion") {
                                                $refund = $refundController->getRefundStudent($payment->getId_payment());
                                                ?>
                                                <td class="red"><?= $refund->getRef_concept() . "<br>" . date("d-m-Y H:i", strtotime($refund->getRef_date())) ?></td>
                                            <?php } else { ?>
                                                <td class="yellow"> no hay</td>
                                            <?php } ?>
                                        <?php } ?>
                                        <td><?= date("d-m-Y H:i", strtotime($payment->getPay_date())) ?></td>
                                        <td><?= $payment->getMonth() ?></td>
                                        <td><?= $payment->getAmount() ?>€</td>
                                        <td><?= $payment->getMethod() ?></td>
                                        <td><?= $payment->getConcept() ?></td>
                                        <?php if ($payment->getPay_stage() == "Pagado") { ?>
                                            <td class="green"><?= $payment->getPay_stage() ?></td>
                                        <?php } else if ($payment->getPay_stage() == "Devolucion") { ?>
                                            <td class="red"><?= $payment->getPay_stage() ?></td>
                                        <?php } else { ?>
                                            <td class="yellow"><?= $payment->getPay_stage() ?></td>
                                        <?php } ?>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td><?= EMPTYPAY_MSG ?></td>
                            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                                <td>-</td>
                                <td>-</td>
                            <?php } ?>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    <?php } ?>
                </table><br>
            </form>
        </div>
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->