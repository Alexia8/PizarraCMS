<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$upu = "";
$users = $userController->getUsers();
if (isset($_GET['upu'])) {
    extract($_GET);
}
if (isset($_POST['upUser'])) {
    $count = 0;
    extract($_POST);
    for ($i = 0; $i < count($idU); $i++) {
        if ($userController->updateUserRole($roleCombo[$i], $idU[$i])) {
            $count++;
        }
    }
    if ($count == count($idU)) {
        $msg = UP_MSG;
        header("location: usersUp.php?msgU=$msg");
    } else {
        $msg = ERROR_MSG;
    }
}
if (isset($_GET['msgU'])) {
    $upu = 2;
    $msg = $_GET['msgU'];
}

if (isset($_POST['delUser'])) {
    extract($_POST);
    if ($userController->delUser($delUserCombo)) {
        $msg = DEL_MSG;
        header("location: users.php?msgDU=$msg");
    } else {
        $msg = ERROR_MSG;
    }
}
$direct = true;
include '../inc/header.php';
?>
<div id="main">
    <a href="users.php"><div class="back" title="Volver atrás"></div></a>
    <div class="wrapper">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
            <section id="contentA" class="col col_1">
                <?php if ($upu == 3) { ?>
                    <h3><?= TITLE_DELUSER ?></h3>
                    <select name="delUserCombo">
                        <?php foreach ($users as $userDel) { ?>
                            <option value="<?= $userDel->getId_user() ?>"><?= $userDel->getUsername() . " - " . $userDel->getEmail() ?></option>
                        <?php } ?>
                    </select><br>
                    <input type="submit" value="eliminar" name="delUser">
                <?php } else if ($upu == 2) { ?>                
                    <h3><?= TITLE_UPUSER ?></h3>
                    <?php foreach ($users as $userObject) { ?>
                        <div class="user col col_3">
                            <?php if ($userObject->getActivated() == 0) { ?>
                                <div id="userInactive"></div>
                            <?php } else { ?>
                                <div id="userActive"></div>
                            <?php } ?>
                            <br><h4><?= $userObject->getUsername() ?></h4><br>
                            <h4><?= $userObject->getEmail() ?></h4><br>
                            <select name="roleCombo[]">
                                <option value="1" <?= (1 == $userObject->getType() ? 'selected="selected"' : ' ' ) ?>>Administrador</option>
                                <option value="2" <?= (2 == $userObject->getType() ? 'selected="selected"' : ' ' ) ?>>Operador</option>
                                <option value="3" <?= (3 == $userObject->getType() ? 'selected="selected"' : ' ' ) ?>>Consultor</option>
                            </select>
                            <input type="number" name="idU[]" value="<?= $userObject->getId_user() ?>" hidden>
                        </div>
                    <?php } ?>
                    <div class="col col_1">
                        <input type="submit" value="actualizar" name="upUser">
                    </div>
                <?php } ?>
            </section>
        </form>
        <section class="col col_1">
            <?php if ($msg != "") { ?>
                <p id='message'><?= $msg ?></p>
            <?php } ?>
        </section>
    </div>

</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->
