<?php

require_once('./func.php');
if (isset($_GET['id']) && !isset($_GET['action'])) {
    delete((int) $_GET['id'], 'galeria');
    //this code will delete image from folder
    $path = '../img/galeria/';
    if (unlink($path . $_GET['filename'])) {
        header('Location: galeria_admin.php');
    } else {
        print('A következő file törlése nem sikerült: ' . $_GET['filename']);
    }
}
?>