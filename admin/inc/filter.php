<label>Sede:</label>
<select name="sedesCombo">
    <option value="-1">All</option>
    <?php foreach ($academies as $academy) { ?>
        <option value="<?= $academy->getId_academy() ?>" <?= ($sedesCombo === $academy->getId_academy() ? 'selected="selected"' : ' ' ) ?>><?= $academy->getLocation() ?></option>
    <?php } ?>
</select>
<label>Especialidad:</label>
<select name="coursesCombo">
    <option value="-1">All</option>
    <?php foreach ($courses as $course) { ?>
        <option value="<?= $course->getId_course() ?>" <?= ($coursesCombo === $course->getId_course() ? 'selected="selected"' : ' ' ) ?>><?= $course->getCourse_name() ?></option>
    <?php } ?>
</select>
<label>Dia:</label>
<select name="daysCombo">
    <option value="-1">All</option>
    <?php for ($i = 0; $i < count($days); $i++) { ?>
        <option value="<?= $days[$i]['day'] ?>" <?= ($daysCombo === $days[$i]['day'] ? 'selected="selected"' : ' ' ) ?>><?= $days[$i]['day'] ?></option>
    <?php } ?>
</select>
<label>Grupo:</label>
<select name="groupCombo">
    <option value="-1">All</option>
    <?php for ($i = 0; $i < count($groupsL); $i++) { ?>
        <option value="<?= $groupsL[$i]['group'] ?>" <?= ($groupCombo === $groupsL[$i]['group'] ? 'selected="selected"' : ' ' ) ?>><?= $groupsL[$i]['group'] ?></option>
    <?php } ?>
</select>
<label>|| Orden:</label>
<?php if (!$orderClass && !$payClass && !$teachClass) { ?>
    <select name="orderCombo">
        <?php for ($i = 0; $i < count($fields) - 15; $i++) { ?>
            <option value="<?= $fields[$i]['Field'] ?>" <?= ($orderCombo === $fields[$i]['Field'] ? 'selected="selected"' : ' ' ) ?>><?= $fields[$i]['Field'] ?></option>
        <?php } ?>
    </select>
<?php } ?>
<?php if ($orderClass) { ?>
    <select name="orderCombo">
        <option value="id_academy"<?= ($orderCombo === 'id_academy' ? 'selected="selected"' : ' ' ) ?>>Sede</option>
        <option value="id_course"<?= ($orderCombo === 'id_course' ? 'selected="selected"' : ' ' ) ?>>Especialidad</option>
        <option value="day"<?= ($orderCombo === 'day' ? 'selected="selected"' : ' ' ) ?>>Dia</option>
        <option value="group"<?= ($orderCombo === 'group' ? 'selected="selected"' : ' ' ) ?>>Grupo</option>
    </select>
<?php } ?>
<?php if ($payClass) { ?>
    <select name="orderCombo">
        <?php for ($i = 0; $i < count($fields) - 15; $i++) { ?>
            <?php if ($fields[$i]['Field'] != "dni" && $fields[$i]['Field'] != "surname" && $fields[$i]['Field'] != "surname2") { ?>
                <option value="<?= $fields[$i]['Field'] ?>" <?= ($orderCombo === $fields[$i]['Field'] ? 'selected="selected"' : ' ' ) ?>><?= $fields[$i]['Field'] ?></option>
            <?php } ?>
        <?php } ?>
        <?php for ($j = 0; $j < count($fieldsPay) - 1; $j++) { ?>
            <?php if ($fieldsPay[$j]['Field'] != "method" && $fieldsPay[$j]['Field'] != "id_payment") { ?>
                <option value="<?= $fieldsPay[$j]['Field'] ?>" <?= ($orderCombo === $fieldsPay[$j]['Field'] ? 'selected="selected"' : ' ' ) ?>><?= $fieldsPay[$j]['Field'] ?></option>
            <?php } ?>
        <?php } ?>
    </select>
<?php } if ($teachClass) { ?>
    <select name="orderCombo">
        <?php for ($j = 0; $j < count($fieldsTeach); $j++) { ?>
            <option value="<?= $fieldsTeach[$j]['Field'] ?>" <?= ($orderCombo === $fieldsTeach[$j]['Field'] ? 'selected="selected"' : ' ' ) ?>><?= $fieldsTeach[$j]['Field'] ?></option>
        <?php } ?>
    </select>
<?php } ?>
<label>limit:</label>
<select name="limitCombo">
    <?php for ($i = 0; $i < count($limits); $i++) { ?>
        <option value="<?= $limits[$i] ?>" <?= ($limitCombo == $limits[$i] ? 'selected="selected"' : ' ' ) ?>><?= $limits[$i] ?></option>
    <?php } ?>
</select><br>