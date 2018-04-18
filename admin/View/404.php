<?php
include '../inc/repository.php';
$user="";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../site_media/css/style.css" rel="stylesheet" type="text/css"/>
        <title><?= HEADER_TITLE ?></title>
    </head>
    <body>
        <header>
            <a href="../inc/exit.php"><div class="exit" title="Cerrar Sesion"></div></a>
            <a href="index.php"><div class="home" title="Volver a la página Principal"></div></a>
            <h1><?= HEADER_TITLEH1 ?></h1>
            <h2>NOT FOUND</h2>
        </header>
        <div class="wrapper">
            <section id="oops">
                <div class="error bounce"></div>
                <h3>OOPS !</h3>
                <h3><?= ERROR404 ?></h3>
            </section>
        </div>
    </body>
</html>
<?php
include '../inc/footer.php';
