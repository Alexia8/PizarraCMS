<?php
$title = "";
include '../Controller/Main.php';
$groups = $groupController->getGroupsTotal();
$direct = false;
include '../inc/header.php';
?>
<div id="main">
    <a href="overview.php"><div class="back" title="Volver atrás"></div></a>
    <div class="wrapper">
        <section id="statsG" class="col col_1">
            <h3><?= TITLE_STATS ?></h3>
            <div class="col col_3">
                <div class="col col_1">
                    <label>Alumnos</label>
                </div>
                <div class="col col_1">
                    <canvas id="myTotalChart" class="charts"></canvas>
                </div>
            </div>
            <div id="form" class="col col_3">
                <div class="col col_1">
                    <label>Sistema</label>
                </div>
                <div class="col col_1">
                    <canvas id="myTotalChart3" class="charts"></canvas>
                </div>
            </div>

            <div class="col col_3">
                <div class="col col_1">
                    <label>Pagos</label>
                </div>
                <div class="col col_1">
                    <canvas id="myTotalChart2" class="charts"></canvas>
                </div>
            </div>
        </section>

        <section id="statsT" class="col col_1">
            <h3><?= TITLE_STATS." por Grupo" ?></h3>
            <div id="form" class="col_1">
                <div class="col col_1">
                    <select id="groupSel" name="groupSel">
                        <?php
                        foreach ($groups as $group) {
                            $academy = $academyController->getAcademy($group->getId_academy());
                            $course = $courseController->getCourse($group->getId_course());
                            ?>
                            <option value="<?= $group->getId_group() ?>"><?= $academy->getLocation() . " -> " . $group->getDay() . " " . $group->getGroup() . " - " . $course->getCourse_name() ?></option>
                        <?php } ?>
                    </select>
                    <button id="okButton" onclick="selectStat()">OK</button>
                </div>
            </div>
            <div class="col col_1">
                <div class="col col_2">
                    <div class="col col_1">
                        <label>Alumnos</label>
                    </div>
                    <div class="col col_1">
                        <canvas id="myChart" class="charts"></canvas>
                    </div>
                </div>

                <div class="col col_2">
                    <div class="col col_1">
                        <label>Pagos</label>
                    </div>
                    <div class="col col_1">
                        <canvas id="myChart2" class="charts"></canvas>
                    </div>
                </div>
            </div>
        </section>
        <!--<canvas id="myLineChart" class="charts"></canvas>-->
    </div>
</div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->