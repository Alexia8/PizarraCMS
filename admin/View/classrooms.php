<?php
$title="";
include '../Controller/Main.php';
$msg = "";
$teachClass = false;
$academies = $academyController->getAcademiesNo();
$courses = $courseController->getCourses();
$days = $groupController->getDays();
$groupsL = $groupController->getGroupsL();
$groups = $tableController->filterSearchOk(-1, -1, -1, -1, " ", "id_academy", 4, 20);

if (isset($_POST['formClass'])) {
    extract($_POST);
    $groups = $tableController->filterSearchOk($sedesCombo, $coursesCombo, $daysCombo, $groupCombo, "", $orderCombo, 4, $limitCombo);
}
$direct = false;
include '../inc/header.php';
?>
<a href="overview.php"><div class="back"></div></a>
<div class="wrapper">
    <div class="filter">
        <?php
        $orderClass = true;
        $payClass = false;
        ?>
        <h3><?= TITLE_AULAS ?></h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
<?php include '../inc/filter.php'; ?><br>
            <input type="submit" value="search" name="formClass">
        </form>
    </div>
    <div id="contentC" class="col">
        <?php if ($msg != "") { ?>
            <p id="message"><?= $msg ?></p>
<?php } ?>
        <h3 id="count"><?= TOTALCLASS_MSG ?> (<?= count($groups) ?>)</h3>
        <table>
            <tr>
                <th>Nº</th>
                <th>Dia</th>
                <th>Grupo</th>
                <th>Especialidad</th>
                <th>Sede</th>
                <th>Cantidad</th>
            </tr>
            <?php
            if (count($groups) > 0) {
                $i = 0;
                foreach ($groups as $group) {
                    $i++;
                    $course = $courseController->getCourse($group->getId_course());
                    $academy = $academyController->getAcademy($group->getId_academy());
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $group->getDay() ?></td>
                        <td><?= $group->getGroup() ?></td>
                        <td><?= $course->getCourse_name() ?></td>
                        <td> <?= $academy->getLocation() ?></td>
                        <td>1 Aula</td>
                    </tr>
                <?php } ?>
<?php } else { ?>
                <tr>
                    <td><?= EMPTYCLASS_MSG ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        <?php } ?>
        </table>
        <?php if (count($groups) >= 19) { ?>
            <div class="space2"></div>
<?php } ?> 
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->

