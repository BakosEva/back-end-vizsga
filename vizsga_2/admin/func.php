<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function delete($id, $tablename) {
    return execute("DELETE FROM " . $tablename . " WHERE id='" . (int) $id . "'");
}

//type hint
//tipus deklaráció
function update(array $fields, string $tablaname, int $id) {
    $sql = "UPDATE " . $tablaname . " SET ";
    foreach ($fields as $key => $value) {
        $sql .= $key . " = '" . $value . "', ";
    }
    $sql = substr($sql, 0, strlen($sql) - 2);
    $sql .= " WHERE id='" . $id . "'";

    return execute($sql);
}

function select(array $fields, string $tablename) {
    
}

function selectOne(array $fields, string $tablename, int $id) {
    $sql = "SELECT ";
    foreach ($fields as $key => $value) {
        $sql .= $value . ',';
    }
    $sql = substr($sql, 0, strlen($sql) - 1);
    $sql .= ' FROM ' . $tablename;
    $sql .= " WHERE id = '" . $id . "'";
    return execute($sql);
}

function insertRow(array $fields, string $tablename) {
    $sql = "INSERT INTO `" . $tablename . "` ";
    $sqlkey = " (";
    $sqlvalue = " (";
    foreach ($fields as $key => $value) {
        $sqlkey .= "`" . $key . "`, ";
        if ($key != "datum") {
            $sqlvalue .= "'" . $value . "', ";
        } else {
            $sqlvalue .= $value . ", ";
        }
    }
    $sqlkey = substr($sqlkey, 0, strlen($sqlkey) - 2);
    $sqlvalue = substr($sqlvalue, 0, strlen($sqlvalue) - 2);
    $sql .= $sqlkey . ") VALUES " . $sqlvalue . ");";
    return execute($sql);
}

function execute($sql) {
    require_once('./conf.php');
    $mysqli = mysqli_connect($servername, $username, $password, $dbname);
    if (!$mysqli) {
        die('A kapcsolat létrehozása sikertelen (E.T.) ' . mysqli_connect_error());
    }
    $result = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);
    return $result;
}

function fetch($result) {
    $resultArray = [];
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $resultArray[] = $row;
            }
        }
    }
    return $resultArray;
}
