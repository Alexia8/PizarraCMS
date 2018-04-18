<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
if (isset($_GET['s'])) {
    extract($_GET);
    $courses = $courseController->getCourses();
    $academies = $academyController->getAcademies();
    $days = $groupController->getDays();
    $groupsL = $groupController->getGroupsL();
    $fields = $studentController->getAllStudentColumns();
    if ($s == 1) {
        $titleS = TITLE_ENROLLED;
        $students = $tableController->filterSearchOk(-1, -1, -1, -1, "Inscrito", "enrolled_date", 1, 10);
    } elseif ($s == 2) {
        $titleS = TITLE_FINISHED;
        $students = $tableController->filterSearchOk(-1, -1, -1, -1, "Finalizado", "ended_date", 1, 10);
    } else {
        $titleS = TITLE_CANCELLED;
        $students = $tableController->filterSearchOk(-1, -1, -1, -1, "Baja", "cancelled_date", 1, 10);
    }
}

if (isset($_POST['formIns'])) {
    extract($_POST);
    switch ($_GET['s']) {
        case 0:
            $students = $tableController->filterSearchOk($sedesCombo, $coursesCombo, $daysCombo, $groupCombo, "Baja", $orderCombo, 1, $limitCombo);
            break;
        case 1:
            $students = $tableController->filterSearchOk($sedesCombo, $coursesCombo, $daysCombo, $groupCombo, "Inscrito", $orderCombo, 1, $limitCombo);
            break;
        case 2:
            $students = $tableController->filterSearchOk($sedesCombo, $coursesCombo, $daysCombo, $groupCombo, "Finalizado", $orderCombo, 1, $limitCombo);
            break;
    }
}

if (isset($_POST['checkBoxFormI'])) {
    if (!empty($_POST['idStu'])) {
        extract($_POST);
        if ($tableController->checkButtons($checkBoxFormI, $idStu, $commentsUp, $groupsComboC, "", "", "", $idGroup)) {
            header("location: stage.php?s=$s");
        } else {
            $msg = ERROR_MSG;
        }
    } else {
        $msg = EMPTYSTUC_MSG;
    }
}

if (isset($_POST['checkGroupChange'])) {
    if ($_POST['checkGroupChange'] == 'groupChange') {
        extract($_POST);
        if (!empty($coursesComboC) && !empty($sedesComboC)) {
            $groupChange = $groupController->getGroups($sedesComboC, $coursesComboC);
        }
    }
}
$direct = false;
include '../inc/header.php';
?>
<div class="wrapper">
    <a href="overview.php" title="Volver atrás"><div class="back"></div></a>
    <div class="filter col_1">
        <h3><?= $titleS ?></h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
            <?php include '../inc/filter.php'; ?><br>
            <input type="submit" value="search" name="formIns">
        </form>
    </div>
    <div id="contentC">
        <?php if ($msg != "") { ?>
            <p id="message"><?= $msg ?></p>
        <?php } ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formCheck">
            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                <p id="alta"><input type="submit" value="sign" name="checkBoxFormI" title="Alta Alumno"/></p>
                <p id="edit"><input type="submit" value="edit" name="checkBoxFormI" title="Modificar Notas"/></p>
                <p id="baja"><input type="submit" value="cancel" name="checkBoxFormI" title="Baja Alumno"/></p>
                <p id="end"><input type="submit" value="end" name="checkBoxFormI" title="Finalizar Alumno"/></p>
                <p id="change"><input type="submit" value="change" name="checkGroupChange" title="Cambio Grupo"/></p>
            <?php } ?>
            <div class="col_1">
                <?php if (isset($_POST['checkGroupChange']) == 'change') { ?>
                    <select name="sedesComboC">
                        <?php foreach ($academies as $academy) { ?>
                            <option value="<?= $academy->getId_academy() ?>" <?= ($sedesComboC === $academy->getId_academy() ? 'selected="selected"' : ' ' ) ?>><?= $academy->getLocation() ?></option>
                        <?php } ?>
                    </select>
                    <select name="coursesComboC">
                        <?php foreach ($courses as $course) { ?>
                            <option value="<?= $course->getId_course() ?>" <?= ($coursesComboC === $course->getId_course() ? 'selected="selected"' : ' ' ) ?>><?= $course->getCourse_name() ?></option>
                        <?php } ?>
                    </select>
                    <p id="arrow"><input type="submit" value="groupChange" name="checkGroupChange"/></p>
                <?php } ?>
                <?php if (isset($_POST['checkGroupChange']) == 'groupChange') { ?>
                    <select name="groupsComboC">
                        <?php foreach ($groupChange as $group) { ?>
                            <option value="<?= $group->getId_group() ?>"><?= $group->getDay() ?>-<?= $group->getGroup() ?></option>
                        <?php } ?>
                    </select>
                    <p id="okA"><input type="submit" value="switch" name="checkBoxFormI" title="Finalizar Cambio Grupo"/></p>
                <?php } ?>
            </div>
            <h3 id="count">Total <?= $titleS . ": (" . count($students) . ")" ?></h3>
            <table>
                <tr>
                    <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                        <th><input type="checkbox" id="selAll"/></th>
                    <?php } ?>
                    <th>Nº</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Apellido2</th>
                    <th>DNI</th>
                    <th>Grupo</th>
                    <th>Especialidad</th>
                    <th>Sede</th>
                    <?php if ($s == 0) { ?>
                        <th>Fecha Baja</th>     
                    <?php } elseif ($s == 1) { ?>
                        <th>Fecha Inscrito</th>     
                    <?php } elseif ($s == 2) { ?>
                        <th>Fecha Finalizado</th>     
                    <?php } ?>
                    <th>Notas</th>  
                </tr>
                <?php if (count($students) > 0) { ?>
                    <?php
                    $i = 0;
                    foreach ($students as $student) {
                        $i++;
                        ?>
                        <?php
                        $groupStudent = $groupController->getGroup($student->getId_group());
                        $courseStudent = $courseController->getCourse($groupStudent->getId_course());
                        $academyStudent = $academyController->getAcademy($groupStudent->getId_academy());
                        ?>
                        <tr>
                            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                                <td><input type="checkbox" name="idStu[]" value="<?= $student->getId_student() ?>"/>
                                    <input type="number" name="idGroup[]" value="<?= $student->getId_group() ?>" hidden/></td>
                            <?php } ?>
                            <td><?= $i ?></td>
                            <?php if ($_GET['s'] == 1) { ?>
                                <td><a a class="yellow" href="profile.php?i=<?= $student->getId_student() ?>">#<?= $student->getId_student() ?></a></td>
                            <?php } elseif ($_GET['s'] == 2) { ?>
                                <td><a class="black" href="profile.php?i=<?= $student->getId_student() ?>">#<?= $student->getId_student() ?></a></td>
                            <?php } else { ?>
                                <td><a class="red" href="profile.php?i=<?= $student->getId_student() ?>">#<?= $student->getId_student() ?></a></td>
                            <?php } ?>
                            <td><?= $student->getName() ?></td>
                            <td><?= $student->getSurname() ?></td>
                            <td><?= $student->getSurname2() ?></td>
                            <td><?= $student->getDni() ?></td>
                            <td><?= $groupStudent->getDay() ?>  <?= $groupStudent->getGroup() ?></td>
                            <td><?= $courseStudent->getCourse_name() ?></td>
                            <td><?= $academyStudent->getLocation() ?></td>
                            <?php if ($s == 0) { ?>
                                <td><?= date("d-m-Y H:i", strtotime($student->getCancelled_date())) ?></td>      
                            <?php } elseif ($s == 1) { ?>
                                <td><?= date("d-m-Y H:i", strtotime($student->getEnrolled_date())) ?></td>    
                            <?php } elseif ($s == 2) { ?>
                                <td><?= date("d-m-Y H:i", strtotime($student->getEnded_date())) ?></td>     
                            <?php } ?>
                            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                                <td><textarea name="commentsUp[]" value="<?= $student->getComments() ?>"><?= $student->getComments() ?></textarea></td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php if ($s == 3) { ?>
                            <td></td>     
                        <?php } ?>
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>
            </table>
        </form>
    </div>
    <?php if (count($students) >= 10) { ?>
        <div class="space2"></div>
    <?php } ?> 
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->