<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$courses = $courseController->getCourses();
if (isset($_GET["idna"])) {
    extract($_GET);
    $academy = $academyController->getAcademy($idna);
} else {
    header("location: index.php");
}

if (isset($_POST['InFormC'])) {
    extract($_POST);
    if (!empty($courseName) && !empty($startIn) && !empty($endIn)) {
        $input = $courseController->newCourse($courseName, $startIn, $endIn, 0, 0);
        if ($input[0]) {
            $courseId = $courseController->getCourseByName($courseName);
            $input2 = $groupController->newGroup("General", "A", "General", 1, $courseId->getId_course(), $idacademyc, 0, 0);
            if ($input2[0]) {
                $msg = $courseName . " y Grupo General " . IN_MSG;
            } else {
                switch ($input2[1]) {
                    case 1:
                        $msg = $courseName . " " . IN_MSG . " pero " . FAIL_MSG . " en la creación del grupo General";
                        break;
                    case 2:
                        $msg = ERROR_MSG;
                        break;
                }
            }
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = $courseName . " " . REP_MSG;
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

if (isset($_POST['SelFormC'])) {
    extract($_POST);
    if (!empty($courseId)) {
        $selection = $courseController->getCourse($courseId);
    } else {
        $msg = SEL_MSG;
    }
}

if (isset($_POST['UpFormC'])) {
    extract($_POST);
    if (!empty($courseUp) && !empty($startUp) && !empty($endUp)) {
        $input = $courseController->newCourse($courseUp, $startUp, $endUp, $idcourse, 1);
        if ($input[0]) {
            $msg = $courseUp . " " . UP_MSG;
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = $courseUp . " " . REP_MSG;
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

if (isset($_POST['DelFormC'])) {
    extract($_POST);
    if (!empty($courseDel)) {
        if ($courseController->delCourse($courseDel)) {
            $msg = DEL_MSG;
        } else {
            $msg = FAILDEL_MSG;
        }
    }
}
$direct=true;
include '../inc/header.php';
?>
<div id="main">
    <a href="courses.php?ida=<?= $academy->getId_academy() ?>"><div class="back"></div></a>
    <div class="wrapper">
        <section class="filter" class="col">
            <?php if (isset($_GET['c'])) { ?>
                <?php if ($_GET['c'] == 1) { ?>
                    <h3><?= TITLE_NEWCOURSE ?><br><?= $academy->getLocation() ?> </h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                        <label>Especialidad*</label><br>
                        <input type="text" name="courseName" required autofocus><br>
                        <label>Fecha Inicio*</label><br>
                        <input type="date" name="startIn" required><br>
                        <label>Fecha Fin*</label><br>
                        <input type="date" name="endIn" required><br>
                        <input type="number" name="idacademyc" value="<?= $academy->getId_academy() ?>" hidden><br>
                        <input type="submit" value="crear" name="InFormC">
                    </form>
                <?php } ?>

                <?php if ($_GET['c'] == 2) { ?>
                    <h3><?= TITLE_UPCOURSE ?></h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                        <label>Especialidades</label><br>
                        <select name="courseId">
                            <?php foreach ($courses as $course) { ?>
                                <option value="<?= $course->getId_course() ?>"><?= $course->getCourse_name() ?></option>
                            <?php } ?>
                        </select><br>
                        <input type="submit" value="elegir" name="SelFormC">
                    </form>

                    <?php if (isset($_POST['SelFormC'])) { ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                            <input type="number" name="idcourse" value="<?= $selection->getId_course() ?>" hidden>
                            <label>Especialidad</label><br>
                            <input type="text" name="courseUp" placeholder="introduce especialidad" value="<?= $selection->getCourse_name() ?>" required autofocus><br>
                            <label>Fecha Inicio</label><br>
                            <input type="date" name="startUp" value="<?= $selection->getStart_date() ?>" required><br>
                            <label>Fecha Fin</label><br>
                            <input type="date" name="endUp" value="<?= $selection->getEnd_date() ?>" required><br>
                            <input type="submit" value="actualizar" name="UpFormC">
                        </form>
                    <?php } ?>
                <?php } ?>

                <?php if ($_GET['c'] == 3) { ?>
                    <h3><?= TITLE_DELCOURSE ?></h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                        <label>Especialidades</label><br>
                        <select name="courseDel">
                            <?php foreach ($courses as $course) { ?>
                                <option value="<?= $course->getId_course() ?>"><?= $course->getCourse_name() ?></option>
                            <?php } ?>
                        </select><br><br>
                        <input type="submit" value="eliminar" name="DelFormC">
                    </form>
                <?php } ?>
            <?php } ?>
            <?php if ($msg != "") { ?>
                <p id="message"><?= $msg ?></p>
            <?php } ?>
        </section>
    </div>    
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->

