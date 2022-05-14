<?php

require_once './conf.php';

function select_id($tabla, $idname, $mezonev, $mezoertek) {
    $sql = "SELECT " . $idname . " FROM " . $tabla . " WHERE " . $mezonev . " = '" . $mezoertek . "'";
    return $sql;
}

if (isset($_POST['nev']) && isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['kategoria']) && isset($_POST['datum']) && isset($_POST['uzenet'])) {
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $kategoria = $_POST['kategoria'];
    $datum = $_POST['datum'];
    $uzenet = trim($_POST['uzenet']);
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sqlfoto_id = select_id('fotokategoria', 'foto_id', 'kategoria', "$kategoria");
    $resultfoto_id = mysqli_query($conn, $sqlfoto_id);
    //$return = '';
    if ($resultfoto_id) {
        $return = mysqli_fetch_assoc($resultfoto_id);
    }
    //print('<pre>');
    //var_dump($return);
    $foto_id = (int) $return['foto_id'];
    $sqlerdeklodo = "INSERT INTO erdeklodo (nev, email, foto_id, datum, uzenet, b_datum) 
            VALUES ('" . $nev . "', '" . $email . "', '" . $foto_id . "', '" . $datum . "', '" . $uzenet . "', now())";
    //$erd_id = select_id('erdeklodo', 'erd_id', 'nev', "$nev");

    $result1 = mysqli_query($conn, $sqlerdeklodo);
    mysqli_close($conn);
    header('Location: kapcsolat.php');
} else {
    die('Not call this file! This file is not phone!');
}

