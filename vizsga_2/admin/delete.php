<?php

require_once('./func.php');
if (isset($_GET['id']) && !isset($_GET['action'])) {
    delete((int) $_GET['id'], 'erdeklodo');
    header('Location: erdeklodok.php');
} else {
    header('Location: erdeklodok.php');
}
?>