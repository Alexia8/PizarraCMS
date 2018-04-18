<?php
if ($direct) {
    if ($user->getType() != 1) {
        header("location: 404.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= HEADER_TITLE ?></title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Rubik');
        </style>
        <link href="../../site_media/css/style.css" rel="stylesheet" type="text/css"/>  
        <link href="../../site_media/css/forms.css" rel="stylesheet" type="text/css"/>
        <link href="../../site_media/css/emails.css" rel="stylesheet" type="text/css"/>
        <link href="../../site_media/css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="../../site_media/css/media.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <?php if ($title != "Admin Platform") { ?>
                <a href="../inc/exit.php"><div class="exit" title="Cerrar Sesion"></div></a>
                <a href="index.php"><div class="home" title="Volver a la página Principal"></div></a>
                <a href="stats.php"><div id="statsPic" title="Ver Estadisticas"></div></a>
                <a href="search.php" title="Buscar Alumno"><div id="search"></div></a>
                <?php } ?>
            <h1><?= HEADER_TITLEH1 ?></h1>
            <h2><?= $title ?></h2>
        </header>
        <main>