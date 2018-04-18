<?php
$title = "";
include '../Controller/Main.php';
$titleV = "";
$msg = "";
$payComboC = "";
$payComboM = "";
$payComboQ = "";
$commentsUpP = "";
$months = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
if (isset($_GET["p"])) {
    extract($_GET);
    $courses = $courseController->getCourses();
    $academies = $academyController->getAcademies();
    $days = $groupController->getDays();
    $groupsL = $groupController->getGroupsL();
    $fields = $studentController->getAllStudentColumns();
    $stages = $studentController->getAllStudentStages();
    $fieldsPay = $paymentController->getPaymentColumns();
    if ($p == 1) {
        $titleV = TITLE_PAID;
        $payments = $tableController->filterSearchOk(-1, -1, -1, -1, "Alta", "id_student", 2, 10, 1);
    } else {
        $titleV = TITLE_UNPAID;
        $payments = $tableController->filterSearchOk(-1, -1, -1, -1, "Alta", "id_student", 3, 10);
    }
} else {
    header("location: index.php");
}

if (isset($_POST['formPay'])) {
    extract($_POST);
    switch ($p) {
        case 0:
            $payments = $tableController->filterSearchOk($sedesCombo, $coursesCombo, $daysCombo, $groupCombo, $stageCombo, $orderCombo, 3, $limitCombo);
            break;
        case 1:
            $payments = $tableController->filterSearchOk($sedesCombo, $coursesCombo, $daysCombo, $groupCombo, $stageCombo, $orderCombo, 2, $limitCombo, $intervalCombo);
            break;
    }
}

if (isset($_POST['checkBoxFormP'])) {
    if (!empty($_POST['idStuP'])) {
        extract($_POST);
        if ($tableController->checkButtons($checkBoxFormP, $idStuP, $commentsUpP, 0, $payComboM, $payComboC, $payComboQ, $idGroupP)) {
            header("location: payments.php?p=$p");
        } else {
            $msg = ERROR_MSG;
        }
    } else {
        $msg = EMPTYSTUC_MSG;
    }
}
$direct = false;
include '../inc/header.php';
?>
<a href="overview.php" title="Volver atrás"><div class="back"></div></a>
<div class="wrapper">
    <div class="filter">
        <h3><?= $titleV ?></h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
            <label>Estado: </label>
            <select name="stageCombo">
                <?php for ($i = 0; $i < count($stages); $i++) { ?>
                    <option value="<?= $stages[$i]['stage'] ?>" <?= ($stageCombo == $stages[$i]['stage'] ? 'selected="selected"' : ' ' ) ?>><?= $stages[$i]['stage'] ?></option>
                <?php } ?>
            </select>
            <?php if ($_GET["p"] == 1) { ?>
                <label>Intervalo: </label>
                <select name="intervalCombo">
                    <?php for ($i = 0; $i < count($intervals); $i++) { ?>
                        <option value="<?= $intervals[$i] ?>" <?= ($intervalCombo == $intervals[$i] ? 'selected="selected"' : ' ' ) ?>><?= $intervals[$i] ?></option>
                    <?php } ?>
                </select>
                <?php $payClass = true; ?>
            <?php } ?>
            <label> || </label>
            <?php include '../inc/filter.php'; ?><br>
            <input id="filterBtn" type="submit" value="search" name="formPay">
        </form>
    </div>
    <div id="contentC">
        <?php if ($msg != "") { ?>
            <p id="message"><?= $msg ?></p>
        <?php } ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formCheck">
            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                <p id="baja"><input type="submit" value="cancel" name="checkBoxFormP" title="Baja Alumno"/></p>
                <p id="edit"><input type="submit" value="edit" name="checkBoxFormP" title="Modificar Notas"/></p>
                <p id="end"><input type="submit" value="end" name="checkBoxFormP" title="Finalizar Alumno"/></p>
                <?php if ($_GET["p"] == 0) { ?>
                    <p id="paid"><input type="submit" value="pay" name="checkAddPay" title="Añadir Pago"/></p>
                <?php } ?>
            <?php } ?>
            <div class="col_1">
                <?php if (isset($_POST['checkAddPay']) == 'pay') { ?>
                    <select name="payComboC">
                        <option value="Mensualidad" <?= ($payComboC === "Mensualidad" ? 'selected="selected"' : ' ' ) ?>>Mensualidad</option>
                        <option value="Materiales" <?= ($payComboC === "Materiales" ? 'selected="selected"' : ' ' ) ?>>Materiales</option>
                        <option value="Reserva" <?= ($payComboC === "Reserva" ? 'selected="selected"' : ' ' ) ?>>Reserva</option>
                        <option value="Septiembre" <?= ($payComboC === "Septiembre" ? 'selected="selected"' : ' ' ) ?>>Septiembre</option>
                    </select>
                    <select name="payComboM">
                        <?php for ($i = 0; $i < count($months); $i++) { ?>
                            <option value="<?= $months[$i] ?>"  <?= ($payComboM === $months[$i] ? 'selected="selected"' : ' ' ) ?>> <?= $months[$i] ?></option>
                        <?php } ?>
                    </select>
                    <select name="payComboQ">
                        <option value="50" <?= ($payComboQ === "50" ? 'selected="selected"' : ' ' ) ?>>50€</option>
                        <option value="75" <?= ($payComboQ === "75" ? 'selected="selected"' : ' ' ) ?>>75€</option>
                        <option value="100" <?= ($payComboQ === "100" ? 'selected="selected"' : ' ' ) ?>>100€</option>
                        <option value="150" <?= ($payComboQ === "150" ? 'selected="selected"' : ' ' ) ?>>150€</option>
                    </select>
                    <p id="okA"><input type="submit" value="addPay" name="checkBoxFormP" title="Finalizar Añadir Pago"/></p>
                <?php } ?>
            </div>
            <h3 id="count">Total <?= $titleV ?>: (<?= count($payments) ?>)</h3>
            <table>
                <tr>
                    <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                        <th><input type="checkbox" id="selAll"/></th>
                    <?php } ?>
                    <th>Nº</th>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <?php if ($_GET["p"] == 1) { ?>
                        <th>Estado</th>
                        <th>Cantidad</th>
                        <th>Concepto</th>
                        <th>Mes</th>
                        <th>FechaPago</th>
                    <?php } else { ?>
                        <th>Cuenta</th>
                        <th>Tlf</th>
                    <?php } ?>
                    <th>Notas</th>     
                </tr>
                <?php if (count($payments) > 0) { ?>
                    <?php
                    $i = 0;
                    foreach ($payments as $payment) {
                        $i++;
                        ?>
                        <?php $student = $studentController->getStudent($payment->getId_student()) ?>
                        <tr>
                            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                                <td><input type="checkbox" name="idStuP[]" value="<?= $student->getId_student() ?>"/>
                                    <input type="number" name="idGroupP[]" value="<?= $student->getId_group() ?>" hidden/></td>
                            <?php } ?>
                            <td><?= $i ?></td>
                            <?php if ($stageCombo == 'Inscrito') { ?>
                                <td><a a class="yellow" href="profile.php?i=<?= $payment->getId_student() ?>">#<?= $payment->getId_student() ?></a></td>
                            <?php } elseif ($stageCombo == 'Finalizado') { ?>
                                <td><a class="black" href="profile.php?i=<?= $payment->getId_student() ?>">#<?= $payment->getId_student() ?></a></td>
                            <?php } elseif ($stageCombo == 'Baja') { ?>
                                <td><a class="red" href="profile.php?i=<?= $payment->getId_student() ?>">#<?= $payment->getId_student() ?></a></td>
                            <?php } else { ?>
                                <td><a class="green" href="profile.php?i=<?= $payment->getId_student() ?>">#<?= $payment->getId_student() ?></a></td>
                            <?php } ?>
                            <td><?= $student->getName() . " " . $student->getSurname() . " " . $student->getSurname2() ?></td>
                            <td><?= $student->getEmail() ?></td>
                            <?php if ($_GET["p"] == 1) { ?>
                                <?php if ($payment->getPay_stage() == "Pagado") { ?>
                                    <td class="green"><?= $payment->getPay_stage() ?></td>
                                <?php } else if ($payment->getPay_stage() == "Devolucion") { ?>
                                    <td class="red"><?= $payment->getPay_stage() ?></td>
                                <?php } else { ?>
                                    <td class="yellow"><?= $payment->getPay_stage() ?></td>
                                <?php } ?>
                                <td><?= $payment->getAmount() ?>€</td>
                                <td><?= $payment->getConcept() ?></td>
                                <td><?= $payment->getMonth() ?></td>
                                <td><?= date("d-m-Y H:i", strtotime($payment->getPay_date())) ?></td>
                            <?php } else { ?>
                                <td><?= $student->getAccount() ?></td>
                                <td><?= $student->getTel_mobile() ?></td>
                            <?php } ?>
                            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                                <td><textarea name="commentsUpP[]" value="<?= $student->getComments() ?>"><?= $student->getComments() ?></textarea></td>
                            <?php } else { ?>
                                <td><?= $student->getComments() ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td><?= EMPTYSTU_MSG ?></td>
                        <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                            <td></td>
                        <?php } ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php if ($_GET["p"] == 1) { ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>
            </table>
        </form>
    </div>
    <?php if (count($payments) >= 10) { ?>
        <div class="space2"></div>
    <?php } ?> 
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->



