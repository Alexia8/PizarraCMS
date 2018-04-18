<?php
$title="";
include '../Controller/Main.php';
if (isset($_GET["ida"])) {
    extract($_GET);
    $courses = $courseController->getAcademyCourses($ida);
    $academy = $academyController->getAcademy($ida);
} else {
    header("location: overview.php");
}
$direct=false;
include '../inc/header.php';
?>
<div id="main">
    <a href="overview.php"><div class="back" title="Volver atrás"></div></a>
    <?php if ($user->getType() == 1 && $user->getActivated() == 1) { ?>
        <div id="menuS" onclick="openNav()"></div>
        <div id="menuSC" onclick="closeNav()"></div>
        <div id="mySidenav" class="sidenav">
            <a href="courseUp.php?c=1&idna=<?= $academy->getId_academy() ?>" class="topa">Añadir<br>Especialidad<div id="add"></div></a>
            <a href="courseUp.php?c=2&idna=<?= $academy->getId_academy() ?>">Actualizar<br>Especialidad<div id="update"></div></a>
            <a href="courseUp.php?c=3&idna=<?= $academy->getId_academy() ?>">Eliminar<br>Especialidad<div id="delete"></div></a>
        </div>
    <?php } ?>

    <div class="wrapper">
        <section id="contentA">
            <h3><?= TITLE_COURSES?><br><?= $academy->getLocation() ?></h3>
            <?php if (count($courses) > 0) { ?>
                <?php foreach ($courses as $course) { ?>
                    <div class="col col_3">
                        <div class="course"></div>
                        <a href="groups.php?idc=<?= $course->getId_course() ?>&ida=<?= $academy->getId_academy() ?>"><h4><span><?= $course->getCourse_name() ?></span></h4></a> 
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h4><?=EMPTYCOURSE_MSG?> <?= $academy->getLocation() ?></h4>
            <?php } ?>
        </section>  
        <?php if (count($courses) >= 6) { ?>
            <section class="space">

            </section>
        <?php } ?>
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->