<?php
$title = "";
include '../Controller/Main.php';
$academies = $academyController->getAcademies();
$direct=false;
include '../inc/header.php';
?>
<div id="main">
    <?php if ($user->getType() == 1 && $user->getActivated() == 1) { ?>
        <div id="menuS" onclick="openNav()"></div>
        <div id="menuSC" onclick="closeNav()"></div>
        <div id="mySidenav" class="sidenav">
            <a href="academyUp.php?a=1" class="topa">Nueva<br>Sede<div id="add"></div></a>
            <a href="academyUp.php?a=2">Actualizar<br>Sede<div id="update"></div></a>
            <a href="academyUp.php?a=3">Eliminar<br>Sede<div id="delete"></div></a>
            <a href="users.php">Configurar<br>Usuarios<div id="users"></div></a>
            <a href="newStudent.php">Alta<br>Alumno<div id="add2"></div></a>
            <a href="stage.php?s=2">Ex<br>Alumnos<div id="ended"></div></a>
        </div>
    <?php } ?>
    <div class="wrapper">
        <section id="contentA" class="col">
            <h3><?= TITLE_GENERAL ?></h3>
            <a href="stage.php?s=1" class="option col col_6">
                <div class="option2">
                    <h4 class="optionTitle">Inscritos</h4>
                </div>
            </a>

            <a href="payments.php?p=1" class="option col col_6">
                <div class="option3">
                    <h4 class="optionTitle">Pagados</h4>
                </div>
            </a>

            <a href="stage.php?s=0" class="option col col_6">
                <div class="option1">
                    <h4 class="optionTitle">Bajas</h4>
                </div>
            </a>

            <a href="classrooms.php" class="option col col_6">
                <div class="option5">
                    <h4 class="optionTitle">Aulas</h4>
                </div>
            </a>

            <a href="payments.php?p=0" class="option col col_6">
                <div class="option4">
                    <h4 class="optionTitle">NO Pagados</h4>
                </div>
            </a>

            <a href="teachers.php" class="option col col_6">
                <div class="option6">
                    <h4 class="optionTitle">Profesores</h4>
                </div>
            </a>

        </section>

        <section id="content" class="academy">
            <h3><?= TITLE_ACADEMY ?></h3>
            <?php if (count($academies) > 0) { ?>
                <?php foreach ($academies as $academy) { ?>
                    <div class="col col_3">
                        <div class="locIcon"></div>
                        <a href="courses.php?ida=<?= $academy->getId_academy() ?>"><h4><?= $academy->getLocation() ?></h4></a> 
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h4><?= EMPTYACADEMY_MSG ?></h4>
            <?php } ?>
        </section>  
        <?php if (count($academies) > 6) { ?>
            <section class="space"></section>
            <?php } ?>
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->

