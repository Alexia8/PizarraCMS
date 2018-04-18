<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$users = $userController->getUsers();
if (isset($_GET['msgDU'])) {
    $msg = $_GET['msgDU'];
}
if (isset($_POST['activeUser'])) {
    extract($_POST);
    for ($i = 0; $i < count($idua); $i++) {
        if ($deactivate[$i] == 0) {
            if ($userController->adminUpdateStatusUser(0, $idua[$i])) {
                $msg = DEACTIVATEUSER_MSG;
                header("location: users.php?msgDU=$msg");
            } else {
                $msg = ERROR_MSG;
            }
        } else {
            if ($userController->adminUpdateStatusUser(1, $idua[0])) {
                $msg = ACTIVATEUSER_MSG;
                header("location: users.php?msgDU=$msg");
            } else {
                $msg = ERROR_MSG;
            }
        }
    }
}
$direct = true;
include '../inc/header.php';
?>
<div id="main">
    <a href="overview.php"><div class="back" title="Volver atrás"></div></a>
    <?php if ($user->getType() == 1 && $user->getActivated() == 1) { ?>
        <div id="menuS" onclick="openNav()"></div>
        <div id="menuSC" onclick="closeNav()"></div>
        <div id="mySidenav" class="sidenav">
            <a href="regUser.php" class="topa">Nuevo<br>Usuario<div id="add"></div></a>
            <a href="usersUp.php?upu=2">Actualizar<br>Usuario<div id="update"></div></a>  
            <a href="usersUp.php?upu=3">Eliminar<br>Usuario<div id="delete"></div></a>
        </div>
    <?php } ?>
    <div class="wrapper">
        <section id="contentA" class="col">
            <h3><?= TITLE_USER ?></h3>
            <section class="col col_1">
                <?php if ($msg != "") { ?>
                    <p id='message'><?= $msg ?></p>
                <?php } ?>
            </section>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                <?php foreach ($users as $userObject) { ?>
                    <div class="user col col_3">
                        <?php if ($userObject->getActivated() == 0) { ?>
                            <div id="userInactive"></div>
                        <?php } else { ?>
                            <div id="userActive"></div>
                        <?php } ?>
                        <h4><?= $userObject->getUsername() ?></h4>
                        <h4><?= $userObject->getEmail() ?></h4>
                        <?php if ($userObject->getType() == 1) { ?>
                            <h4>Administrador</h4>
                        <?php } elseif ($userObject->getType() == 2) { ?>
                            <h4>Operador</h4>
                        <?php } else { ?>
                            <h4>Consultor</h4>
                        <?php } ?>
      
                    </div>
                <?php } ?>
                <!--<input type="submit" value="actualizar" name="activeUser"><br>-->
            </form>
        </section>
        <section class="space"></section>
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->
