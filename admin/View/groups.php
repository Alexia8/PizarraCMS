<?php
$title="";
include '../Controller/Main.php';
if (isset($_GET["ida"]) && isset($_GET["idc"])) {
    extract($_GET);
    $groups = $groupController->getGroups($ida, $idc);
    $academy = $academyController->getAcademy($ida);
    $course = $courseController->getCourse($idc);
} else {
    header("location: index.php");
}
$direct=false;
include '../inc/header.php';
?>
<div id="main">
    <a href="courses.php?ida=<?= $academy->getId_academy() ?>" title="Volver atrás"><div class="back"></div></a>
    <?php if ($user->getType() == 1 && $user->getActivated() == 1) { ?>
        <div id="menuS" onclick="openNav()"></div>
        <div id="menuSC" onclick="closeNav()"></div>
        <div id="mySidenav" class="sidenav">
            <a href="groupUp.php?g=1&idgc=<?= $course->getId_course() ?>&idga=<?= $academy->getId_academy() ?>" class="topa">Añadir<br>Grupo<div id="add"></div></a>
            <a href="groupUp.php?g=2&idgc=<?= $course->getId_course() ?>&idga=<?= $academy->getId_academy() ?>">Actualizar<br>Grupo<div id="update"></div></a>
            <a href="groupUp.php?g=3&idgc=<?= $course->getId_course() ?>&idga=<?= $academy->getId_academy() ?>">Eliminar<br>Grupo<div id="delete"></div></a>
            <a href="groupUp.php?g=4&idgc=<?= $course->getId_course() ?>&idga=<?= $academy->getId_academy() ?>">Asignar<br>Profesor<div id="users"></div></a>
        </div>
    <?php } ?>

    <div class="wrapper">
        <section id="contentA">
            <h3><?= TITLE_GROUPS ?> <?= $academy->getLocation() ?><br><?= $course->getCourse_name() ?></h3>
            <?php if (count($groups) > 0) { ?>
                <?php foreach ($groups as $group) { ?>
                    <div class="col col_3">
                        <div class="group"></div>
                        <a href="students.php?idg=<?= $group->getId_group() ?>">
                            <h4>Grupo: <span><?= $group->getDay() ?> <?= $group->getGroup() ?></span><br>Tipo: <span><?= $group->getType() ?></span></h4>
                        </a> 
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h4><?= EMPTYGROUP_MSG ?> <?= $course->getCourse_name() ?> para <?= $academy->getLocation() ?></h4>
            <?php } ?>
        </section>  
        <?php if (count($groups) >= 6) { ?>
            <section class="space">

            </section>
        <?php } ?>
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->