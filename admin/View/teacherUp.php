<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$teachers = $teacherController->getAllTeachers('id_teacher', 9999999999999);
if (isset($_POST['teachForm'])) {
    extract($_POST);
    if (!empty($tname) && !empty($tsurname) && !empty($tsurname2) && !empty($temail) && !empty($tel_mobilet)) {
        $input = $teacherController->newTeacher($tname, $tsurname, $tsurname2, $temail, $tel_mobilet, 'Alta', 0);
        if ($input[0]) {
            $msg = $tname . " " . $tsurname . " " . $tsurname2 . " " . IN_MSG;
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = $temail . " o " . $tel_mobile . " " . REP_MSG;
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

if (isset($_POST['teachSelForm'])) {
    extract($_POST);
    if (!empty($selComboT)) {
        $selection = $teacherController->getTeacher($selComboT);
    } else {
        $msg = SEL_MSG;
    }
}

if (isset($_POST['teachUpForm'])) {
    extract($_POST);
    if (!empty($tnameUp) && !empty($tsurnameUp) && !empty($tsurname2Up) && !empty($temailUp) && !empty($tel_mobiletUp)) {
        $input = $teacherController->newTeacher($tnameUp, $tsurnameUp, $tsurname2Up, $temailUp, $tel_mobiletUp, $tstageUp, 1, $idTUp);
        if ($input[0]) {
            $msg = $tnameUp . " " . $tsurnameUp . " " . $tsurname2Up . " " . UP_MSG;
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = $temail . " o " . $tel_mobile . " " . REP_MSG;
                    break;
                case 2:
                    $msg = ERROR_MSG;
                    break;
            }
        }
    }
}

if (isset($_POST['teachDelForm'])) {
    extract($_POST);
    if (!empty($teacherDel)) {
        if ($teacherController->delTeacher($teacherDel)) {
            $msg = DEL_MSG;
        } else {
            $msg = FAILDEL_MSG;
        }
    }
}

$direct = true;
include '../inc/header.php';
?>
<div id="main">
    <a href="teachers.php"><div class="back"></div></a>   
    <div class="wrapper">
        <div class="filter">
            <?php if ($_GET['t'] == 1) { ?>
                <h3><?= TITLE_TEACHIN ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <div class="col col_1">
                        <label>Nombre*</label><br>
                        <input type="text" name="tname" required><br>
                        <label>Apellido*</label><br>
                        <input type="text" name="tsurname" required><br>
                        <label>Segundo Apellido*</label><br>
                        <input type="text" name="tsurname2" required><br>
                        <label>Email*</label><br>
                        <input type="email" name="temail" required><br>
                        <label>Móvil*</label><br>
                        <input type="number" name="tel_mobilet" required pattern=".{9,9}" title="Debe Contener 9 números"><br>
                    </div>
                    <input type="submit" value="crear" name="teachForm">
                </form>
            <?php } ?>
            <?php if ($_GET['t'] == 2) { ?>
                <h3><?= TITLE_TEACHUP ?></h3>
                <?php if (!isset($_POST['teachSelForm'])) { ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                        <select name='selComboT'>
                            <?php foreach ($teachers as $teacher) { ?>
                                <option value="<?= $teacher->getId_teacher() ?>" <?= ($teachersCombo === $teacher->getId_teacher() ? 'selected="selected"' : ' ' ) ?>><?= $teacher->getT_name() . " " . $teacher->getT_surname() . " " . $teacher->getT_surname2() ?></option>
                            <?php } ?>
                        </select><br>
                        <input type="submit" value="ok" name="teachSelForm">
                    </form>
                <?php } ?>
                <?php if (isset($_POST['teachSelForm'])) { ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                        <div class="col col_1">
                            <label>Nombre*</label><br>
                            <input type="text" name="tnameUp" value="<?= $selection->getT_name() ?>" required><br>
                            <label>Apellido*</label><br>
                            <input type="text" name="tsurnameUp" value="<?= $selection->getT_surname() ?>" required><br>
                            <label>Segundo Apellido*</label><br>
                            <input type="text" name="tsurname2Up" value="<?= $selection->getT_surname2() ?>" required><br>
                            <label>Email*</label><br>
                            <input type="email" name="temailUp"  value="<?= $selection->getT_email() ?>"required><br>
                            <label>Móvil*</label><br>
                            <input type="number" name="tel_mobiletUp"  value="<?= $selection->getTel() ?>"required pattern=".{9,9}" title="Debe Contener 9 números"><br>
                            <label>Estado*: </label><br>
                            <select name="tstageUp">
                                <option value="Alta" <?= ("Alta" === $selection->getT_stage() ? 'selected="selected"' : ' ' ) ?>>Alta</option>
                                <option value="Baja" <?= ("Baja" === $selection->getT_stage() ? 'selected="selected"' : ' ' ) ?>>Baja</option>
                            </select><br>
                        </div>
                        <input type="number" name="idTUp" value="<?= $selection->getId_teacher() ?>" hidden>
                        <input type="submit" value="actualizar" name="teachUpForm">
                    </form>
                <?php } ?>
            <?php } ?>
            <?php if ($_GET['t'] == 3) { ?>
                <h3><?= TITLE_TEACHDEL ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <select name='teacherDel'>
                        <?php foreach ($teachers as $teacher) { ?>
                            <option value="<?= $teacher->getId_teacher() ?>" <?= ($teachersCombo === $teacher->getId_teacher() ? 'selected="selected"' : ' ' ) ?>><?= $teacher->getT_name() . " " . $teacher->getT_surname() . " " . $teacher->getT_surname2() ?></option>
                        <?php } ?>
                    </select><br>
                    <input type="submit" value="eliminar" name="teachDelForm">
                </form>
            <?php } ?>
            <?php if ($msg != "") { ?>
                <p id="message"><?= $msg ?></p>
            <?php } ?>
        </div>
    </div>
    <?php
    include '../inc/footer.php';
    ?>
    <!--END FILE-->