<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$fields = $studentController->getAllStudentColumns();

if (isset($_POST['formSearch']) && (!empty($_POST['search']) && !empty($_POST['value']))) {
    extract($_POST);
    $studentSearch = $studentController->searchStudent($search, $value);
    if (!empty($studentSearch)) {
        $id = $studentSearch[0]["id_student"];
        header("location: profile.php?i=$id");
    } else {
        $msg = FAILSTU_MSG;
    }
}
if (isset($_POST['formSearchName']) && (!empty($_POST['valueN']) && !empty($_POST['valueS']) && !empty($_POST['valueS2']))) {
    extract($_POST);
    $studentSearch = $studentController->searchStudentByName($valueN, $valueS, $valueS2);
    if (!empty($studentSearch)) {
        $id = $studentSearch->getId_student();
        header("location: profile.php?i=$id");
    } else {
        $msg = FAILSTU_MSG;
    }
}
$direct=false;
include '../inc/header.php';
?>
<a href="overview.php" title="Volver atrás"><div class="back"></div></a>
<div class="wrapper">
    <div class="filter formsCrud">
        <h3><?= TITLE_SEARCH ?></h3>
         <h4>Buscar por nombre completo</h4>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
            <input type="text" name="valueN" placeholder="nombre" autofocus>
            <input type="text" name="valueS" placeholder="apellido" autofocus>
            <input type="text" name="valueS2"  placeholder="apellido2"autofocus><br>
            <input type="submit" value="search" name="formSearchName">
        </form> <br>
        <hr>
        <h4>Buscar por otro campo</h4>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
            <select name="search">
                <?php for ($i = 0; $i < count($fields) - 10; $i++) { ?>
                    <?php if ($fields[$i]['Field'] != "name" && $fields[$i]['Field'] != "surname" && $fields[$i]['Field'] != "surname2" && $fields[$i]['Field'] != "stage") { ?>
                        <option value="<?= $fields[$i]['Field'] ?>"><?= $fields[$i]['Field'] ?></option>
                    <?php } ?>  
                <?php } ?>  
            </select><br><br>
            <input type="text" name="value" placeholder="valor" autofocus><br>
            <input type="submit" value="search" name="formSearch">
        </form><br>
        <?php if ($msg != "") { ?>
            <p id="message"><?= $msg ?></p>
        <?php } ?>
    </div>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->

