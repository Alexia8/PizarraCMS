<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
if (isset($_GET['idst'])) {
    extract($_GET);
    $student = $studentController->getStudent($idst);
    $groups = $groupController->getGroupsTotal();
} else {
    header("location: index.php");
}

if (isset($_GET['idst']) && isset($_GET['d']) == 1) {
    extract($_GET);
    if ($studentController->delStudent($idst,$student->getId_group())) {
        header("location: index.php");
    }
}

if (isset($_POST['upStuForm'])) {
    if (!empty($_POST['groupSel']) && !empty($_POST['stage']) && !empty($_POST['discovery']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['surname2']) && !empty($_POST['dni']) && !empty($_POST['email']) && !empty($_POST['tel_mobile']) && !empty($_POST['account']) && !empty($_POST['address']) && !empty($_POST['cp']) && !empty($_POST['district'])) {
        extract($_POST);
        if (empty($absents)) {
            $absents = 0;
        }
        if (empty($tel_home)) {
            $tel_home = 0;
        } else if (!mb_strlen($tel_home) == 9) {
            $msg = FAILNUMF_MSG;
        }
        if (mb_strlen($account) == 24) {
            if (mb_strlen($tel_mobile) == 9) {
                if (mb_strlen($cp) == 5) {
                    if (mb_strlen($dni) == 9) {
                        $input = $studentController->newStudent($name, $surname, $surname2, $dni, $email, $tel_home, $tel_mobile, $account, $stage, $discovery, $newsletter, $exstudent, $address, $cp, $district, $absents, $comments, $groupSel, 1, $idStu);
                        if ($input[0]) {
                            $msg = $name . " " . $surname . " " . $surname2 . " " . UP_MSG;
                            header("location: profile.php?i=$idStu&op=2&msg=$msg");
                        } else {
                            switch ($input[1]) {
                                case 1:
                                    $msg = "Alumno con " . $dni . " o " . $email . " " . REP_MSG;
                                    break;
                                case 2:
                                    $msg = ERROR_MSG;
                                    break;
                            }
                        }
                    } else {
                        $msg = FAILDNI_MSG;
                    }
                } else {
                    $msg = FAILCP_MSG;
                }
            } else {
                $msg = FAILNUM_MSG;
            }
        } else {
            $msg = FAILIBAN_MSG;
        }
    } else {
        $msg = OB_MSG;
    }
}
$direct=false;
include '../inc/header.php';
?>
<a href="profile.php?i=<?= $student->getId_student() ?>"><div class="back"></div></a>
<div class="wrapper">
    <div class="filter">
        <h3><?= TITLE_MODIFYSTU ?></h3>
        <?php if ($msg != "") { ?>
            <p id="message"><?= $msg ?></p>
        <?php } ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
            <div class="col col_3">
                <label>Grupo*: </label><br>
                <select name="groupSel">
                    <?php
                    foreach ($groups as $group) {
                        $academy = $academyController->getAcademy($group->getId_academy());
                        $course = $courseController->getCourse($group->getId_course());
                        ?>
                        <option value="<?= $group->getId_group() ?>" <?= ($student->getId_group() === $group->getId_group() ? 'selected="selected"' : ' ' ) ?>><?= $academy->getLocation() . " -> " . $group->getDay() . " " . $group->getGroup() . " - " . $course->getCourse_name() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col col_3">
                <label>Estado*: </label><br>
                <select name="stage">
                    <option value="Alta" <?= ($student->getStage() === "Alta" ? 'selected="selected"' : ' ' ) ?>>Alta</option>
                    <option value="Baja" <?= ($student->getStage() === "Baja" ? 'selected="selected"' : ' ' ) ?>>Baja</option>
                    <option value="Inscrito" <?= ($student->getStage() === "Inscrito" ? 'selected="selected"' : ' ' ) ?>>Inscrito</option>
                    <option value="Finalizado" <?= ($student->getStage() === "Finalizado" ? 'selected="selected"' : ' ' ) ?>>Finalizado</option>
                </select>
            </div>
            <div class="col col_3">
                <label>Discovery: </label><br>
                <select name="discovery">
                    <option value="Facebook" <?= ($student->getDiscovery() === "Facebook" ? 'selected="selected"' : ' ' ) ?>>Facebook</option>
                    <option value="Recomendacion Amigo" <?= ($student->getDiscovery() === "Recomendacion Amigo" ? 'selected="selected"' : ' ' ) ?>>Recomendación Amigo</option>
                    <option value="Motores de Busqueda" <?= ($student->getDiscovery() === "Motores De Busqueda" ? 'selected="selected"' : ' ' ) ?>>Motores de Búsqueda</option>
                </select>
            </div>
            <div class="col col_3">
                <input type="number" name="idStu" value="<?= $student->getId_student() ?>"hidden><br>
                <label>Nombre*</label><br>
                <input type="text" name="name" value="<?= $student->getName() ?>" required><br>
                <label>Apellido*</label><br>
                <input type="text" name="surname" value="<?= $student->getSurname() ?>" required><br>
                <label>Segundo Apellido*</label><br>
                <input type="text" name="surname2" value="<?= $student->getSurname2() ?>" required><br>
                <label>DNI*</label><br>
                <input type="text" name="dni" required minlength="9" maxlength="9" title="Debe Contener 8 números y 1 letra" value="<?= $student->getDni() ?>"><br>
                <label>Ex-alumno: </label>
                <input type="radio" name="exstudent" value="0" <?= ($student->getEx_Student() === "0" ? 'checked="checked"' : ' ' ) ?>>No
                <input type="radio" name="exstudent" value="1"  <?= ($student->getEx_Student() === "1" ? 'checked="checked"' : ' ' ) ?>>Sí
            </div>
            <div class="col col_3">
                <label>Email*</label><br>
                <input type="email" name="email" value="<?= $student->getEmail() ?>" required><br>
                <label>Tel Fijo</label><br>
                <input type="number" name="tel_home" pattern=".{9,9}" title="Debe Contener 9 números" value="<?= $student->getTel_home() ?>"><br>
                <label>Móvil*</label><br>
                <input type="number" name="tel_mobile" required pattern=".{9,9}" title="Debe Contener 9 números" value="<?= $student->getTel_mobile() ?>"><br>
                <label>IBAN*</label><br>
                <input type="text" name="account" required maxlength="24" title="Debe empezar por ES y contener 22 números" value="<?= $student->getAccount() ?>"><br>
                <textarea name="comments" placeholder="<?= $student->getComments() ?>"><?= $student->getComments() ?></textarea><br><br>
                <input type="submit" value="actualizar" name="upStuForm">
            </div>
            <div class="col col_3">
                <label>Dirección*</label><br>
                <input type="text" name="address" value="<?= $student->getAddress() ?>" required><br>
                <label>Codigo Postal*</label><br>
                <input type="number" name="cp" required pattern=".{5,5}" title="Debe Contener 5 números" value="<?= $student->getPostal_code() ?>"><br>
                <label>Población*</label><br>
                <input type="text" name="district" value="<?= $student->getDistrict() ?>" required><br>
                <label>Faltas</label><br>
                <input type="number" name="absents" value="<?= $student->getAbsents() ?>"><br>
                <label>Newsletter: </label>
                <input type="radio" name="newsletter" value="0"  <?= ($student->getNewsletter() === "0" ? 'checked="checked"' : ' ' ) ?>>No
                <input type="radio" name="newsletter" value="1"  <?= ($student->getNewsletter() === "1" ? 'checked="checked"' : ' ' ) ?>>Sí<br>
            </div>
        </form>
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->


