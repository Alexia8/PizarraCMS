<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$academies = $academyController->getAcademies();
if (isset($_POST['InFormA'])) {
    extract($_POST);
    if (!empty($academyIn)) {
        $input = $academyController->newAcademy($academyIn, 0, 0);
        if ($input[0]) {
            $msg = $academyIn . " " . IN_MSG;
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = $academyIn . " " . REP_MSG;
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

if (isset($_POST['SelFormA'])) {
    extract($_POST);
    if (!empty($academySel)) {
        $selection = $academyController->getAcademy($academySel);
    } else {
        $msg = SEL_MSG;
    }
}

if (isset($_POST['UpFormA'])) {
    extract($_POST);
    if (!empty($academyUp)) {
        $input = $academyController->newAcademy($academyUp, $idacademy, 1);
        if ($input[0]) {
            $msg = $academyUp . " " . UP_MSG;
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = $academyUp . " " . REP_MSG;
                    break;
                case 2:
                    $msg = ERROR_MSG;
                    break;
            }
        }
    }
}

if (isset($_POST['DelFormA'])) {
    extract($_POST);
    if (!empty($academyDel)) {
        if ($academyController->delAcademy($academyDel)) {
            $msg = DEL_MSG;
        } else {
            $msg = FAILDEL_MSG;
        }
    }
}
$direct=true;
include '../inc/header.php';
?>
<a href="overview.php"><div class="back"></div></a>
<div class="wrapper">
    <section class="filter" class="col">
        <?php if (isset($_GET['a'])) { ?>
            <?php if ($_GET['a'] == 1) { ?>
                <h3><?= TITLE_NEWACADMY ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <input type="text" name="academyIn" placeholder="introduce sede" required autofocus><br>
                    <input type="submit" value="crear" name="InFormA">
                </form>
            <?php } ?>

            <?php if ($_GET['a'] == 2) { ?>
                <h3><?= TITLE_UPACADEMY ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <label>Sedes: </label><br>
                    <select name="academySel">
                        <?php foreach ($academies as $academy) { ?>
                            <option value="<?= $academy->getId_academy() ?>"><?= $academy->getLocation() ?></option>
                        <?php } ?>
                    </select><br>
                    <input id="btnSel" type="submit" value="ok" name="SelFormA">
                </form>

                <?php if (isset($_POST['SelFormA'])) { ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                        <input type="number" name="idacademy" value="<?= $selection->getId_academy() ?>" hidden>
                        <input type="text" name="academyUp" placeholder="introduce sede" value="<?= $selection->getLocation() ?>" required autofocus><br>
                        <input type="submit" value="actualizar" name="UpFormA">
                    </form>
                <?php } ?>

            <?php } ?>

            <?php if ($_GET['a'] == 3) { ?>
                <h3><?= TITLE_DELACADEMY ?></h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <label>Sedes: </label><br>
                    <select name="academyDel">
                        <?php foreach ($academies as $academy) { ?>
                            <option value="<?= $academy->getId_academy() ?>"><?= $academy->getLocation() ?></option>
                        <?php } ?>
                    </select><br><br>
                    <input type="submit" value="eliminar" name="DelFormA">
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

