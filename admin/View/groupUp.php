<?php
$title = "";
include '../Controller/Main.php';
$msg = "";

if (isset($_GET["idga"]) && isset($_GET["idgc"])) {
    extract($_GET);
    $academy = $academyController->getAcademy($idga);
    $course = $courseController->getCourse($idgc);
    $teachers = $teacherController->getTeachersActive("id_teacher",100);
    $groups = $groupController->getGroups($idga, $idgc);
}

if (isset($_POST['InFormG'])) {
    extract($_POST);
    if (!empty($typeIn) && !empty($groupIn) && !empty($dayIn) && !empty($idTin)) {
        $input = $groupController->newGroup($typeIn, $groupIn, $dayIn, $idTin, $course->getId_course(), $academy->getId_academy(), 0, 0);
        if ($input[0]) {
            $msg = "Grupo $typeIn $dayIn $groupIn " . IN_MSG;
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = "Grupo $typeIn $dayIn $groupIn " . REP_MSG;
                    break;
                case 2:
                    $msg = ERROR_MSG;
                    break;
            }
        }
    } else {
        $msg = EMPTY_MSG;
    }
}

if (isset($_POST['SelFormG'])) {
    extract($_POST);
    if (!empty($selGroups)) {
        $selection = $groupController->getGroup($selGroups);
    } else {
        $msg = SEL_MSG;
    }
}

if (isset($_POST['UpFormG'])) {
    extract($_POST);
    if (!empty($groupUp) && !empty($dayUp) && !empty($typeUp)) {
        $input = $groupController->newGroup($typeUp, $groupUp, $dayUp, 1, $course->getId_course(), $academy->getId_academy(), $groupId, 1);
        if ($input[0]) {
            $msg = "Grupo $typeUp $dayUp $groupUp " . UP_MSG;
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = "Grupo $typeUp $dayUp $groupUp " . REP_MSG;
                    break;
                case 2:
                    $msg = ERROR_MSG;
                    break;
            }
        }
    } else {
        $msg = EMPTY_MSG;
    }
}

if (isset($_POST['DelFormG'])) {
    extract($_POST);
    if (!empty($groupDel)) {
        if ($groupController->delGroup($groupDel)) {
            $msg = DEL_MSG;
        } else {
            $msg = FAILDEL_MSG;
        }
    }
}

if (isset($_POST['assignFormG'])) {
    extract($_POST);
    if (!empty($groupTeach) && !empty($idTassign)) {
        if ($groupController->assignTeacher($groupTeach, $idTassign)) {
            $msg = ASSIGN_MSG;
        } else {
            $msg = ERROR_MSG;
        }
    }
}
$direct=true;
include '../inc/header.php';
?>
<a href="groups.php?ida=<?= $academy->getId_academy() ?>&idc=<?= $course->getId_course() ?>"><div class="back"></div></a>
<div class="wrapper">
    <section class="filter" class="col">
        <?php if (isset($_GET['g'])) { ?>
            <?php if ($_GET['g'] == 1) { ?>
                <h3><?= TITLE_NEWGROUP ?><br><?= $course->getCourse_name() ?> <?= $academy->getLocation() ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <label>Modalidad*</label><br>
                    <input type="text" name="typeIn" required autofocus><br>
                    <label>Letra Grupo*</label><br>
                    <input type="text" name="groupIn" required><br>
                    <label>Día Grupo*</label><br>
                    <input type="text" name="dayIn" required><br>
                    <label>Profesor* </label><br>
                    <select name="idTin">
                        <?php foreach ($teachers as $teacher) { ?>
                            <option value="<?= $teacher->getId_teacher() ?>"><?= $teacher->getT_name() . " " . $teacher->getT_surname() . " " . $teacher->getT_surname2() ?></option>
                        <?php } ?>
                    </select><br>
                    <input type="submit" value="crear" name="InFormG">
                </form>
            <?php } ?>

            <?php if ($_GET['g'] == 2) { ?>
                <h3><?= TITLE_UPGROUP ?><br><?= $academy->getLocation() ?> <?= $course->getCourse_name() ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <label>Grupos*: </label><br>
                    <select name="selGroups">
                        <?php foreach ($groups as $group) { ?>
                            <option value="<?= $group->getId_group() ?>"><?= $group->getDay() ?>: <?= $group->getGroup() ?></option>
                        <?php } ?>
                    </select><br>
                    <input type="submit" value="elegir" name="SelFormG">
                </form>
                <?php if (isset($_POST['SelFormG'])) { ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                        <input type="number" name="groupId" value="<?= $selection->getId_group() ?>" hidden><br>
                        <label>Modalidad*</label><br>
                        <input type="text" name="typeUp" value="<?= $selection->getType() ?>" required autofocus><br>
                        <label>Letra Grupo*</label><br>
                        <input type="text" name="groupUp" value="<?= $selection->getGroup() ?>"  required><br>
                        <label>Día Grupo*</label><br>
                        <input type="text" name="dayUp" value="<?= $selection->getDay() ?>"  required><br>
                        <input type="submit" value="actualizar" name="UpFormG">
                    </form>
                <?php } ?>
            <?php } ?>

            <?php if ($_GET['g'] == 3) { ?>
                <h3><?= TITLE_DELGROUP ?><br><?= $academy->getLocation() ?> <?= $course->getCourse_name() ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <label>Grupos*: </label><br>
                    <select name="groupDel">
                        <?php foreach ($groups as $group) { ?>
                            <option value="<?= $group->getId_group() ?>"><?= $group->getDay() ?>: <?= $group->getGroup() ?></option>
                        <?php } ?>
                    </select><br><br>
                    <input type="submit" value="eliminar" name="DelFormG">
                </form>
            <?php } ?>

            <?php if ($_GET['g'] == 4) { ?>
                <h3><?= TITLE_ASSIGNTEACH ?><br><?= $academy->getLocation() ?> <?= $course->getCourse_name() ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <label>Grupos*: </label><br>
                    <select name="groupTeach">
                        <?php foreach ($groups as $group) { ?>
                            <option value="<?= $group->getId_group() ?>"><?= $group->getDay() ?>: <?= $group->getGroup() ?></option>
                        <?php } ?>
                    </select><br><br>
                    <label>Profesor* </label><br>
                    <select name="idTassign">
                        <?php foreach ($teachers as $teacher) { ?>
                            <option value="<?= $teacher->getId_teacher() ?>"><?= $teacher->getT_name() . " " . $teacher->getT_surname() . " " . $teacher->getT_surname2() ?></option>
                        <?php } ?>
                    </select><br><br>
                    <input type="submit" value="asignar" name="assignFormG">
                </form>
            <?php } ?>
        <?php } ?>
        <?php if ($msg != "") { ?>
            <p id="message"><?= $msg ?></p>
        <?php } ?>
    </section>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->

