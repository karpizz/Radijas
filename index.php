<?php
include __DIR__ . '/vendor/autoload.php';
session_start();

if (!isset($_SESSION['r'])) {
    $_SESSION['r'] = new Mano\Radijas;
    $_SESSION['power'] = 'off';
}
$db = new Mano\RadijosDB;
// var_dump($db->getAll());
$r = $_SESSION['r'];

if (isset($_POST['power'])) {
    $_SESSION['power'] = $_POST['power'];
    // var_dump($_SESSION['power']);
    // if ($_POST['power'] == 'on') {
    //     $r->power();
    // }
}

if (isset($_POST['volumeUp'])) {
    $r->volumeUp();
}

if (isset($_POST['volumeDown'])) {
    $r->volumeDown();
}

if (isset($_POST['goToNexStationUp'])) {
    $r->goToNexStationUp();
}

if (isset($_POST['goToNexStationDown'])) {
    $r->goToNexStationDown();
}

if (isset($_POST['tuneDown'])) {
    $r->tuneDown();
}

if (isset($_POST['tuneUp'])) {
    $r->tuneUp();
}

if (isset($_POST['savePresets1'])) {
    $r->savePresets1();
}

if (isset($_POST['loadPresets1'])) {
    $r->loadPresets1();
}

if (!empty($_POST)) {
    header('Location: http://localhost/PHP/OOP/Radijas/index.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio</title>
</head>

<body>
    <h3>Radio FM</h3>
    <form action="" method="post">
        <div>
            <?php
            if ($_SESSION['power'] == 'on') {
                $r->power();
            }
            if ($_SESSION['power'] == 'off') {
                echo '<button type="submit" name="power" value="on">Power</button>';
            }
            ?>
        </div>

        <!-- <button type="submit" name="power" value="on">Power</button> -->
        <br><button type="submit" name="volumeUp">Volume Up</button>
        <button type="submit" name="volumeDown">Volume Down</button>
        <button type="submit" name="goToNexStationUp">Next Station Up</button>
        <button type="submit" name="goToNexStationDown">Next Station Down</button>
        <button type="submit" name="tuneDown">Tune Down</button>
        <button type="submit" name="tuneUp">Tune Up</button><br><br>
        <button type="submit" name="savePresets1">Save Presets 1</button>
        <button type="submit" name="savePresets2">Save Presets 2</button>
        <button type="submit" name="savePresets3">Save Presets 3</button>
        <button type="submit" name="loadPresets1">Load Presets 1</button>
        <button type="submit" name="loadPresets2">Load Presets 2</button>
        <button type="submit" name="loadPresets3">Load Presets 3</button>
    </form>
</body>

</html>

<?php

/*
Reliacines duomenu bazes

MySQL


MariaDB - interface PHPMyADMIN


*/