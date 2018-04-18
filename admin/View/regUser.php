<?php
$title = "";
$msg = "";
include '../Controller/Main.php';
if (isset($_POST['formRegister'])) {
    if (!empty($_POST['username']) && !empty($_POST['emailUser']) && !empty($_POST['pass']) && !empty($_POST['role'])) {
        extract($_POST);
        if ($pass == $pass2) {
            $register = $userController->registerUser($username, $emailUser, $pass, $role);
        } else {
            $msg = PASS_MSG;
        }
        if ($register[0]) {
             $emailPass = $userController->adminActivationAccess($emailUser);
            $roles = array(1 => "Administrador", 2 => "Operador", 3 => "Consultor");
            $msgEmail = "  
                <img src='http://lapizarraopositores.com/wp-content/uploads/2016/05/logo_pizarra_letras.png' alt='La Pizarra Opositores/>
                <div id='boxEmail'>
                <h1>Welcome $username!</h1>
                <h2>User info: </h2>
                <ul>
                    <li>Nombre de Usuario: $username</li>
                    <li>Email: $emailUser</li>
                    <li>Privilegios de usuario: $roles[$role]</li>
                    <li>Password temporal: $pass</li>
                </ul>
                <p>Activa tu cuenta aqui: <a href='http://plataformapizarra.alexiacdura.com/admin/View/activate.php?pass='$emailPass'>" . ROOT_ACTIVATE . "?pass=$emailPass</a></p>
            </div>";
            if ($userController->sendEmail($emailUser, REG_MSG, $msgEmail, $username)) {
                $msg = REG_MSG;
            } else {
                $msg = EMAIL_MSG;
            }
        } else {
            switch ($register[1]) {
                case 1:
                    $msg = REPUSER_MSG;
                    break;
                case 2:
                    $msg = ERROR_MSG;
                    break;
            }
        }
    } else {
        $msg = OB_MSG;
    }
}
?>
<?php
$direct=true;
include '../inc/header.php';
?>
<div class="wrapper">
    <a href="users.php"><div class="back"></div></a>
    <div id="box">
        <div class="logo flipInX"></div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formLogin">
            <h3 id="regH3">Register</h3>
            <input type="text" name="username" placeholder="username*"><br>
            <input type="email" name="emailUser" placeholder="email*"><br>
            <input type="password" name="pass" placeholder="password*"><br>
            <input type="password" name="pass2" placeholder="repeat password*"><br>
            <input type="radio" name="role" value="1" checked> Admin
            <input type="radio" name="role" value="2"> Operador
            <input type="radio" name="role" value="3"> Consultor<br>
            <input type="submit" value="register" name="formRegister">
            <?php if (isset($_POST['formRegister'])) { ?>
                <p id='message'><?= $msg ?></p>
            <?php } ?>
        </form>
    </div>
</div>
<?php
include '../inc/footer.php';
