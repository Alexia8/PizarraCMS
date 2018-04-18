<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
if (isset($_GET["idg"])) {
    extract($_GET);
    $students = $studentController->getStudentsByGroup($idg);
    $group = $groupController->getGroup($idg);
    $academy = $academyController->getAcademy($group->getId_academy());
    $course = $courseController->getCourse($group->getId_course());
    $teacher = $teacherController->getTeacher($group->getId_teacher());
    $courses = $courseController->getCourses();
    $academies = $academyController->getAcademies();
} else {
    header("location: groups.php");
}

if (isset($_POST['checkBoxFormS']) && !empty($_POST['stuId'])) {
    extract($_POST);
    if ($tableController->checkButtons($checkBoxFormS, $stuId, $commentsUpS, $groupsComboC, "", "", "", $idGroupS)) {
        header("location: students.php?idg=$idg");
    } else {
        $msg = ERROR_MSG;
    }
} else {
    $msg = EMPTYSTUC_MSG;
}

if (isset($_POST['checkGroupChange'])) {
    if ($_POST['checkGroupChange'] == 'groupChange') {
        extract($_POST);
        if (!empty($sedesComboC) && !empty($coursesComboC)) {
            $groupChange = $groupController->getGroups($sedesComboC, $coursesComboC);
        } else {
            $msg2 = EMPTY_MSG;
        }
    }
}
$direct = false;
include '../inc/header.php';
?>
<div class="wrapper">
    <a href="groups.php?ida=<?= $academy->getId_academy() ?>&idc=<?= $course->getId_course() ?>" title="Volver atrás"><div class="back"></div></a> 
    <div class="filter col_1">
        <h3><?= TITLE_INGROUP ?> <br><?= $group->getDay() . " " . $group->getGroup() ?> - <?= $course->getCourse_name() ?> - <?= $academy->getLocation() ?></h3>
    </div> 
    <div id="contentC">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formCheck">
            <?php if (isset($_POST['checkBoxFormS'])) { ?>
                <p id="message"><?= $msg ?></p>
            <?php } ?>
            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                <p id="baja"><input type="submit" value="cancel" name="checkBoxFormS" title="Baja Alumno"/></p>
                <p id="edit"><input type="submit" value="edit" name="checkBoxFormS" title="Modificar Notas"/></p>
                <p id="end"><input type="submit" value="end" name="checkBoxFormS" title="Finalizar Alumno"/></p>
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
                    <p id="okA"><input type="submit" value="switch" name="checkBoxFormS" title="Finalizar Cambio Grupo"/></p>
                <?php } ?>
            </div>
            <?php if ($teacher->getT_stage() == "Alta") { ?>
                <h3><?= TITLE_TEACHER ?> <?= $teacher->getT_name() . " " . $teacher->getT_surname() . " " . $teacher->getT_surname2() ?></h3>
            <?php } else { ?>
                <h3><?= TITLE_TEACHER . " Sin Profesor -" ?> </h3>
            <?php } ?>
            <h3 id="count"><?= TOTALSTU_MSG ?> (<?= count($students) ?>)</h3>
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
                    <th>Cuenta</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Fecha Alta</th>
                    <th>Notas</th>
                </tr>
                <?php if (count($students) > 0) { ?>
                    <?php
                    $i = 0;
                    foreach ($students as $student) {
                        $i++
                        ?>
                        <tr>
                            <?php if ($user->getType() != 3 && $user->getActivated() == 1) { ?>
                                <td><input type="checkbox" name="stuId[]" value="<?= $student->getId_student() ?>"/>
                                    <input type="number" name="idGroupS[]" value="<?= $student->getId_group() ?>" hidden/></td>
                            <?php } ?>
                            <td><?= $i ?></td>
                            <td><a class="green" href="profile.php?i=<?= $student->getId_student() ?>">#<?= $student->getId_student() ?></a></td>
                            <td><?= $student->getName() ?></td>
                            <td><?= $student->getSurname() ?></td>
                            <td><?= $student->getSurname2() ?></td>
                            <td><?= $student->getAccount() ?></td>
                            <td><?= $student->getDni() ?></td>    
                            <td><?= $student->getEmail() ?></td>
                            <td><?= date("d-m-Y H:i", strtotime($student->getSigned_date())) ?></td>  
                            <td><textarea name="commentsUpS[]" value="<?= $student->getComments() ?>"><?= $student->getComments() ?></textarea></td>
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
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>
            </table>
        </form>
    </div>

</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->