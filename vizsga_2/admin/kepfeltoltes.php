<?php
require_once './conf.php';

function kategoria_id($kategoria) {
//require_once './conf.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vizsga_2";

// Create connection
$conn3 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn3) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT foto_id FROM fotokategoria WHERE kategoria='$kategoria' " ;
$result = mysqli_query($conn3, $sql);
$foto_id = '';
if ($result) {
    $foto_id= mysqli_fetch_array($result);
}
mysqli_close($conn3);

return $foto_id["foto_id"];
}



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0 && isset($_POST["cim"])) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["anyfile"]["name"];
        $filetype = $_FILES["anyfile"]["type"];
        $filesize = $_FILES["anyfile"]["size"];
        $cim = $_POST["cim"];        
        $foto_id=kategoria_id($_POST["kategoria"]);
           
        // Validate file extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
     
        // Validate file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
     
        // Validate type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../img/galeria/" . $filename)){
                echo $filename . " már létezik.";
            } else{
                if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "../img/galeria/" . $filename)){
 
                    $sql="INSERT INTO galeria (filename, type, size, cim, foto_id) VALUES ('$filename','$filetype','$filesize', '$cim', '$foto_id') ";
                    //print('<br>'."$sql".'<br>');
                     
                    mysqli_query($conn,$sql);
                
                    header('Location: ./galeria_admin.php');
                    //echo "Sikeres fájl feltöltés.";
                }else{
 
                   echo "A fájl nem került feltöltésre";
                }
                 
            } 
        } else{
            echo "Hiba történt feltöltéskor. Kérem próbálja újra."; 
        }
    } else{
        //echo "Hiba: " . $_FILES["anyfile"]["error"];
        header('Location: ./galeria.php');
    }
}

mysqli_close($conn);
?>
