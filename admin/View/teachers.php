<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$btnTeach = "";
$orderClass = false;
$payClass = false;
$teachClass = true;
$btnT = "";
$btnS = "";

$teachers = $teacherController->getAllTeachers("id_teacher", 10);
$academies = $academyController->getAcademies();
$courses = $courseController->getCourses();
$days = $groupController->getDays();
$groupsL = $groupController->getGroupsL();
$fieldsTeach = $teacherController->getTeacherColumns();

if (isset($_POST['formTeachers'])) {
    extract($_POST);
    $teachers = $tableController->filterSearchOk($sedesCombo, $coursesCombo, $daysCombo, $groupCombo, "type", $orderCombo, 5, $limitCombo);
    $btnT = "profesores";
}

if (isset($_POST['FormTstu'])) {
    extract($_POST);
    $students = $studentController->getStudentsByTeacher($teachersCombo, $typeCombo, $limitCombo);
    $btnS = "alumnos";
}
$direct = false;
include '../inc/header.php';
?>
<div id="main">
    <a href="overview.php"><div class="back"></div></a> 
    <?php if ($user->getType() == 1 && $user->getActivated() == 1) { ?>
        <div id="menuS" onclick="openNav()"></div>
        <div id="menuSC" onclick="closeNav()"></div>
        <div id="mySidenav" class="sidenav">
            <a href="teacherUp.php?t=1" class="topa">Añadir<br>Profesor<div id="add"></div></a>
            <a href="teacherUp.php?t=2">Actualizar<br>Profesor<div id="update"></div></a>
            <a href="teacherUp.php?t=3">Eliminar<br>Profesor<div id="delete"></div></a>
        </div>
    <?php } ?>
    <div class="wrapper">
        <div class="filter col_1">
            <h3><?= TITLE_TEACHERS ?></h3>
            <div class="col_1">
                <?php if ($msg != "") { ?>
                    <p id="message"><?= $msg ?></p>
                <?php } ?>
                <?php if (isset($_POST['btnS']) || $btnS == "alumnos") { ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form" class="col_1">
                        <select name='teachersCombo'>
                            <?php foreach ($teachers as $teacher) { ?>
                                <option value="<?= $teacher->getId_teacher() ?>" <?= ($teachersCombo === $teacher->getId_teacher() ? 'selected="selected"' : ' ' ) ?>><?= $teacher->getT_name() . " " . $teacher->getT_surname() . " " . $teacher->getT_surname2() ?></option>
                            <?php } ?>
                        </select>
                        <select name="typeCombo">
                            <option value="Presencial"  <?= ($typeCombo === 'Presencial' ? 'selected="selected"' : ' ' ) ?>>Presencial</option>
                            <option value="Online"  <?= ($typeCombo === 'Online' ? 'selected="selected"' : ' ' ) ?>>Online</option>
                        </select>
                        <label> || limit:</label>
                        <select name="limitCombo">
                            <?php for ($i = 0; $i < count($limits); $i++) { ?>
                                <option value="<?= $limits[$i] ?>" <?= ($limitCombo == $limits[$i] ? 'selected="selected"' : ' ' ) ?>><?= $limits[$i] ?></option>
                            <?php } ?>
                        </select><br>
                        <input type="submit" value="search" name="FormTstu">
                    </form>
                <?php } elseif (isset($_POST['btnT']) || $btnT == "profesores" || $btnT == "") { ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form" class="col_1">
                        <?php include '../inc/filter.php'; ?>
                        <input  type="submit" value="search" name="formTeachers">
                    </form>
                <?php } ?>
            </div>
        </div>
        <div id="contentC" class="col">
            <form id="form"  action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="col_20">
                <input type="submit" value="alumnos" name="btnS">
                <input type="submit" value="profesores" name="btnT">
            </form>
            <?php if (!isset($_POST['FormTstu'])) { ?>
                <h3 id="count"><?= TOTALT_MSG ?> (<?= count($teachers) ?>)</h3>
            <?php } else { ?>
                <h3 id="count"><?= TOTALSTU_MSG ?> (<?= count($students) ?>)</h3>
            <?php } ?>
            <table>
                <?php if (!isset($_POST['FormTstu'])) { ?>
                    <tr>
                        <th>Nº</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Apellido2</th>
                        <th>Email</th>
                        <th>Tlf</th>
                        <th>Estado</th>
                    </tr>
                    <?php if (count($teachers) > 0) { ?>
                        <?php
                        $i = 0;
                        foreach ($teachers as $teacher) {
                            $i++;
                            ?>
                            <tr>
                                <td><?= $i ?></a></td>
                                <td class="green">#<?= $teacher->getId_teacher() ?></td>
                                <td><?= $teacher->getT_name() ?></td>
                                <td><?= $teacher->getT_surname() ?></td>
                                <td><?= $teacher->getT_surname2() ?></td>
                                <td><?= $teacher->getT_email() ?></td>
                                <td><?= $teacher->getTel() ?></td>
                                <?php if ($teacher->getT_stage() == 'Baja') { ?>
                                    <td class="red"><?= $teacher->getT_stage() ?></td>
                                <?php } else { ?>
                                    <td class="green"><?= $teacher->getT_stage() ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td><?= EMPTYTEACH_MSG ?></a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <th>Nº</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Apellido2</th>
                        <th>Sede</th>
                        <th>Especialidad</th>
                        <th>Grupo</th>
                        <th>Notas</th>
                    </tr>
                    <?php if (count($students) > 0) { ?>
                        <?php
                        $i = 0;
                        foreach ($students as $student) {
                            $i++;
                            $group = $groupController->getGroup($student->getId_group());
                            $academy = $academyController->getAcademy($group->getId_academy());
                            $course = $courseController->getCourse($group->getId_course());
                            ?>
                            <tr>
                                <td><?= $i ?></a></td>
                                <td><a <a class="green" href="profile.php?i<?= $student->getId_student() ?>">#<?= $student->getId_student() ?></a></td>
                                <td><?= $student->getName() ?></td>
                                <td><?= $student->getSurname() ?></td>
                                <td><?= $student->getSurname2() ?></td>
                                <td><?= $academy->getLocation() ?></td>
                                <td><?= $course->getCourse_name() ?></td>
                                <td><?= $group->getDay() . " " . $group->getGroup() ?></td>
                                <td><textarea><?= $student->getComments() ?></textarea></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td><?= EMPTYSTU_MSG ?></td>
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
                    <?php if (count($students) >= 10) { ?>
                        <div class="space"></div>
                    <?php } ?> 
                <?php } ?>
            </table>
        </div>
        <?php if (count($teachers) >= 10) { ?>
            <div class="space2"></div>
        <?php } ?> 
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->