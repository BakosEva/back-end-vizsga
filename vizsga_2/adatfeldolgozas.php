<?php
function kiir() {
    $szoveg ='Ez egy szöveg';
    return $szoveg;
}

function urlapkategoria() {
require_once ('./conf.php');
// Create connection
$conn1 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT foto_id, kategoria, filter FROM fotokategoria";
$result = mysqli_query($conn1, $sql);
$fotokategoria = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fotokategoria[] = $row;
    }
}
mysqli_close($conn1);

return $fotokategoria;

}
 


function selectfoto (){
require_once ('./conf.php');
// Create connection
$conn2 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn2) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM galeria, fotokategoria WHERE galeria.foto_id = fotokategoria.foto_id";
//print($sql.'<br>');

$result = mysqli_query($conn2, $sql);
$fotogaleria = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fotogaleria[] = $row;
    }
}
mysqli_close($conn2);

return $fotogaleria;
}
