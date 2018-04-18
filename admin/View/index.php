<?php
$msg = "";
$user = "";
$title = "Admin Platform";
include '../Controller/Main.php';
$login = true;
if ($userController->verifySession('user')) {
    header("location: overview.php");
} else {
    if (isset($_POST['formLogin']) && !empty($_POST['username']) && !empty($_POST['pass'])) {
        $login = true;
        extract($_POST);
        if ($userController->verifyUser($username, $pass)) {
            $user = $userController->getUser($username);
            $userController->saveSession('user', $user->getUsername());
            header("location: overview.php");
        } else {
            $msg = ERRORUSER_MSG;
        }
    }

    if (isset($_POST['formRecuperate'])) {
        $login = false;
    }

    if (isset($_POST['formRecOk'])) {
        $login = false;
        if (!empty($_POST['emailR'])) {
            extract($_POST);
            $userR = $userController->getUser($emailR);
            if ($userR != null) {
                $recuperate = $userController->recuperateUser($emailR);
            } else {
                $msg = ERRORUSER_MSG;
            }
            if ($recuperate[0]) {
                $emailPass = $userController->adminActivationAccess($userR->getEmail());
                $msgEmail = "  
                <img src='http://lapizarraopositores.com/wp-content/uploads/2016/05/logo_pizarra_letras.png' alt='La Pizarra Opositores/>
                <div id='boxEmail'>
                <h1>Contraseña Recuperada</h1>
                <h2>Usuario actualizado: </h2>
                <ul>
                    <li>Email: $emailR </li>
                    <li>Nueva Password temporal: $recuperate[1] </li>
                </ul>
                <p>Activa tu cuenta aqui: <a href='http://plataformapizarra.alexiacdura.com/admin/View/activate.php?pass='$emailPass'>" . ROOT_ACTIVATE . "?pass=$emailPass</a></p>
                </div>";
                if ($userController->sendEmail($userR->getEmail(), REC_MSG, $msgEmail, $userR->getUsername())) {
                    $msg = REC_MSG;
                } else {
                    $msg = EMAIL_MSG;
                }
            } else {
                $msg = ERROR_MSG;
            }
        } else {
            $msg = OB_MSG;
        }
    }
}
$direct = false;
include '../inc/header.php';
?>
<div id="box">
    <div class="logo flipInX"></div>
    <?php if ($login) { ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formLogin">
            <h3>Login</h3>
            <input type="text" name="username" placeholder="username"><br>
            <input type="password" name="pass" placeholder="password"><br>
            <input type="submit" value="login" name="formLogin"><br>
            <input type="submit" value="recuperar contraseña" name="formRecuperate">
        </form>
    <?php } else { ?>
        <?php if (isset($_POST['formRecuperate']) || empty($_POST['emailR'])) { ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formLogin">
                <h3>Solicitar nueva contraseña</h3>
                <input type="email" name="emailR" placeholder="email*"><br>
                <input type="submit" value="solicitar" name="formRecOk"><br>
            </form>
        <?php } ?>
        <br><br><a href="index.php">volver a login</a>
    <?php } ?>
    <?php if ($msg != "") { ?>
        <p id="message"><?= $msg ?></p>
    <?php } ?>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->

