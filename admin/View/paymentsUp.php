<?php
$title = "";
include '../Controller/Main.php';
$msg = "";
$months = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$methodCombo = "";
$conceptCombo = "";
$paystageCombo = "";
$monthCombo = "";
$quantityCombo = "";

if (isset($_GET['idst'])) {
    extract($_GET);
    $student = $studentController->getStudent($idst);
} else {
    header("location: index.php");
}

if (isset($_POST['newPayForm'])) {
    extract($_POST);
    if (!empty($methodCombo) && !empty($conceptCombo) && !empty($paystageCombo) && !empty($monthCombo) && (!empty($quantityCombo) || !empty($otherquantityCombo))) {
        $input = $paymentController->newPayment($methodCombo, $quantityCombo, $conceptCombo, $monthCombo, $paystageCombo, $student->getId_student(), $student->getId_group(), 0, 0);
        if ($input[0]) {
            $msg = "Pago: " . $conceptCombo . " - " . $monthCombo . " " . IN_MSG;
        } else {
            switch ($input[1]) {
                case 1:
                    $msg = $conceptCombo . " - " . $monthCombo . " " . REP_MSG;
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
$direct = true;
include '../inc/header.php';
?>
<a href="profile.php?i=<?= $student->getId_student() ?>"><div class="back"></div></a>
<div class="wrapper">
    <section class="filter col_1">
        <h3><?= TITLE_PAY . " <br> " . $student->getName() . " " . $student->getSurname() . " " . $student->getSurname2() ?></h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
            <?php if (!isset($_POST['otherQ']) == 'otra cantidad') { ?>
                <label>Cantidad: </label><br>
                <select name="quantityCombo">
                    <option value="50" <?= ($quantityCombo === "50" ? 'selected="selected"' : ' ' ) ?>>50€</option>
                    <option value="75" <?= ($quantityCombo === "75" ? 'selected="selected"' : ' ' ) ?>>75€</option>
                    <option value="100" <?= ($quantityCombo === "100" ? 'selected="selected"' : ' ' ) ?>>100€</option>
                    <option value="150" <?= ($quantityCombo === "150" ? 'selected="selected"' : ' ' ) ?>>150€</option>
                </select><br>
            <?php } else { ?>
                <div class="otherPay">
                    <label>Otra Cantidad: </label><br>
                    <input type="number" step="0.01" min="0" name="quantityCombo">€<br>
                </div>
            <?php } ?>
            <?php if (isset($_POST['otherQ']) == 'otra cantidad') { ?>
                <input class="payBtn" type="submit" value="cantidades" name="initialQ"><br>
            <?php } else { ?>
                <input class="payBtn" type="submit" value="otra cantidad" name="otherQ"><br>
            <?php } ?>
            <label>Forma de Pago: </label><br>
            <select name="methodCombo">
                <option value="Domiciliacion" <?= ($methodCombo === "Domiciliacion" ? 'selected="selected"' : ' ' ) ?>>Domiciliacion</option>
                <option value="Transferencia" <?= ($methodCombo === "Transferencia" ? 'selected="selected"' : ' ' ) ?>>Transferencia</option>
                <option value="Tarjeta" <?= ($methodCombo === "Tarjeta" ? 'selected="selected"' : ' ' ) ?>>Tarjeta</option>
                <option value="Efectivo" <?= ($methodCombo === "Efectivo" ? 'selected="selected"' : ' ' ) ?>>Efectivo</option>
            </select><br>
            <label>Concepto: </label><br>
            <select name="conceptCombo">
                <option value="Mensualidad" <?= ($conceptCombo === "Mensualidad" ? 'selected="selected"' : ' ' ) ?>>Mensualidad</option>
                <option value="Materiales" <?= ($conceptCombo === "Materiales" ? 'selected="selected"' : ' ' ) ?>>Materiales</option>
                <option value="Reserva" <?= ($conceptCombo === "Reserva" ? 'selected="selected"' : ' ' ) ?>>Reserva</option>
                <option value="Septiembre" <?= ($conceptCombo === "Septiembre" ? 'selected="selected"' : ' ' ) ?>>Septiembre</option>
            </select><br>
            <label>Estado: </label><br>
            <select name="paystageCombo">
                <option value="Pagado" <?= ($paystageCombo === "Pagado" ? 'selected="selected"' : ' ' ) ?>>Pagado</option>
                <option value="Pendiente" <?= ($paystageCombo === "Pendiente" ? 'selected="selected"' : ' ' ) ?>>Pendiente</option>
                <option value="Devolucion" <?= ($paystageCombo === "Devolucion" ? 'selected="selected"' : ' ' ) ?>>Devolucion</option>
                <option value="Exento" <?= ($paystageCombo === "Exento" ? 'selected="selected"' : ' ' ) ?>>Exento</option>
            </select><br>
            <label>Mes</label><br>
            <select name="monthCombo">
                <?php for ($i = 0; $i < count($months); $i++) { ?>
                    <option value="<?= $months[$i] ?>"  <?= ($monthCombo === $months[$i] ? 'selected="selected"' : ' ' ) ?>> <?= $months[$i] ?></option>
                <?php } ?>
            </select><br>
            <input type="submit" value="crear" name="newPayForm">
            <?php if (isset($_POST['newPayForm'])) { ?>
                <p id="message"><?= $msg ?></p> 
            <?php } ?>
        </form>
    </section>
</div>
<?php
include '../inc/footer.php';
?>
<!--END FILE-->



