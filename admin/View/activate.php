<?php
$title = "Admin Platform";
include '../Controller/Main.php';
$user = "";
$msg = "";
$verified = false;
$activated = false;

if (!isset($_GET['pass'])) {
    header("location: ".ROOT_HOME);
}

if (isset($_POST['formValidate']) && !empty($_POST['emailUserV']) && !empty($_POST['passV'])) {
    extract($_POST);
    $user = $userController->getDeactivatedUser($emailUserV, $passV);
    if ($user != null) {
        $verified = true;
    } else {
        $msg = ERRORUSER_MSG;
    }
}

if (isset($_POST['formActivate']) && !empty($_POST['passNew']) && !empty($_POST['passNew2'])) {
    $verified = false;
    extract($_POST);
    if ($passNew == $passNew2) {
        if ($userController->activateUser($idUser, $passNew)) {
            $msg = ACTIVATEUSER_MSG;
            $activated = true;
        } else {
            $msg = ERROR_MSG;
        }
    } else {
        $msg = PASS_MSG;
    }
}
?>
<?php 
$direct=false;
include '../inc/header.php'; ?>
<div class="wrapper">
    <div id="box">
        <div class="logo flipInX"></div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formLogin">
            <?php if (!$verified && !$activated) { ?>
                <h3 id="regH3">Verificar Usuario</h3>
                <input type="text" name="emailUserV" placeholder="email*"><br>
                <input type="password" name="passV" placeholder="password*"><br>
                <input type="submit" value="verificar" name="formValidate">
            </form>
        <?php } elseif ($verified && !$activated) { ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formLogin">
                <h3 id="regH3">Activar Cuenta</h3>
                <input type="number" name="idUser" value="<?= $user->getId_user() ?>" hidden><br>
                <input type="password" name="passNew" placeholder="password*"><br>
                <input type="password" name="passNew2" placeholder="repeat password*"><br>
                <input type="submit" value="activar" name="formActivate"><br>
            <?php } elseif ($activated) { ?>
                <br><br><a href="index.php">Iniciar Sesion</a>
            <?php } ?>
            <?php if ($msg != "") { ?>
                <p id='message'><?= $msg ?></p>
            <?php } ?>
        </form>
    </div>
</div>
<?php include '../inc/footer.php'; ?>
<!--END FILE-->
