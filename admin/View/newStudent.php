<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$groups = $groupController->getGroupsTotal();
if (isset($_POST['stuForm'])) {
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
                        $input = $studentController->newStudent($name, $surname, $surname2, $dni, $email, $tel_home, $tel_mobile, $account, $stage, $discovery, $newsletter, $exstudent, $address, $cp, $district, $absents, $comments, $groupSel, 0);
                        if ($input[0]) {
                            $msg = $name . " " . $surname . " " . $surname2 . " " . IN_MSG;
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
$direct=true;
include '../inc/header.php';
?>
<a href="overview.php"><div class="back"></div></a>
<div class="wrapper">
    <div class="filter">
        <h3><?= TITLE_SIGNED ?></h3>
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
                        <option value="<?= $group->getId_group() ?>"><?= $academy->getLocation() . " -> " . $group->getDay() . " " . $group->getGroup() . " - " . $course->getCourse_name() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col col_3">
                <label>Estado*: </label><br>
                <select name="stage">
                    <option value="alta">Alta</option>
                    <option value="baja">Baja</option>
                    <option value="inscrito">Inscrito</option>
                    <option value="finalizado">Finalizado</option>
                </select>
            </div>
            <div class="col col_3">
                <label>Discovery: </label><br>
                <select name="discovery">Recomendación
                    <option value="Facebook">Facebook</option>
                    <option value="Recomendación Amigo">Recomendación Amigo</option>
                    <option value="Motores de Búsqueda">Motores de Búsqueda</option>
                </select>
            </div>
            <div class="col col_3">
                <label>Nombre*</label><br>
                <input type="text" name="name" required><br>
                <label>Apellido*</label><br>
                <input type="text" name="surname" required><br>
                <label>Segundo Apellido*</label><br>
                <input type="text" name="surname2" required><br>
                <label>DNI*</label><br>
                <input type="text" name="dni" required minlength="9" maxlength="9" title="Debe Contener 8 números y 1 letra"><br>
                <label>Ex-alumno: </label>
                <input type="radio" name="exstudent" value="0" checked>No
                <input type="radio" name="exstudent" value="1">Sí
            </div>
            <div class="col col_3">
                <label>Email*</label><br>
                <input type="email" name="email" required><br>
                <label>Tel Fijo</label><br>
                <input type="number" name="tel_home" pattern=".{9,9}" title="Debe Contener 9 números"><br>
                <label>Móvil*</label><br>
                <input type="number" name="tel_mobile" required pattern=".{9,9}" title="Debe Contener 9 números"><br>
                <label>IBAN*</label><br>
                <input type="text" name="account" required maxlength="24" title="Debe empezar por ES y contener 22 números"><br>
                <textarea name="comments" placeholder="commentarios..."></textarea><br><br>
                <input type="submit" value="crear" name="stuForm">
            </div>
            <div class="col col_3">
                <label>Dirección*</label><br>
                <input type="text" name="address" required><br>
                <label>Codigo Postal*</label><br>
                <input type="number" name="cp" required pattern=".{5,5}" title="Debe Contener 5 números"><br>
                <label>Población*</label><br>
                <input type="text" name="district" required><br>
                <label>Faltas</label><br>
                <input type="number" name="absents"><br>
                <label>Newsletter: </label>
                <input type="radio" name="newsletter" value="0" checked>No
                <input type="radio" name="newsletter" value="1">Sí<br>
            </div>
        </form>
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->