<!DOCTYPE html>
<?php
session_start();
//var_dump($_SESSION);
if (!isset($_SESSION['userid'])) {

    header("Location: ./login.php");
}

require_once('./conf.php');

$mysqli = mysqli_connect($servername, $username, $password, $dbname);
if (!$mysqli) {
    die('A kapcsolat létrehozása sikertelen (E.T.) ' . mysqli_connect_error());
}

$sql = "SELECT id, filename, cim, kategoria FROM galeria, fotokategoria WHERE galeria.foto_id=fotokategoria.foto_id";
$result = mysqli_query($mysqli, $sql);
if ($result) {
    ?>
    <html>
        <head>
            <title>Kép törlése</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
            <link rel="stylesheet" href="./vendors/mdi/css/materialdesignicons.min.css">


            <!-- Faviconhoz -->
            <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
            <link rel="manifest" href="../site.webmanifest">
            <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
            <meta name="msapplication-TileColor" content="#ffffff">
            <meta name="theme-color" content="#ffffff">
            <!-- Faviconhoz -->


            <!-- BS 4.6.0 -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="../css/styles.css">

        </head>
        <body>

            <?php
            include_once './header_admin.php';
            ?>

            <main>

                <div class="content-in px-5 mx-auto">
                    <h1 class="text-center pb-5 py-5" > Kép törlése</h1>

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Kép</th>
                                <th class="text-center">Cím</th>
                                <th class="text-center">Kategória</th>
                                <th class="text-center">Törlés</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php print($row['id']) ?></td>
                                    <td class="text-center"><img src="../img/galeria/<?php print($row['filename']) ?>" width="100px"  /><br><p><?php print($row['filename']) ?></p></td>
                                    <td class="text-center"><?php print($row['cim']) ?></td>
                                    <td class="text-center"><?php print($row['kategoria']) ?></td>                                                        
                                    <td class="text-center">
                                   <!--     <a href="./edit_galeria.php?id=<?php print($row['id']); ?>&filename=<?php print($row['filename']); ?>"><i class="mdi mdi-table-edit px-3 h5"></i></a> -->
                                        <a href="./delete_galeria.php?id=<?php print($row['id']); ?>&filename=<?php print($row['filename']); ?>"><i class="mdi mdi-delete px-3 h5"></i></a>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Kép</th>
                                <th class="text-center">Cím</th>
                                <th class="text-center">Kategoria</th>
                                <th class="text-center">Törlés</th>
                            </tr>
                        </tfoot>
                    </table>

               <!--     <a href="../index.php" > <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Vissza a Főoldalra</button> </a> -->

                </div>
            </main>

            <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#example').DataTable({
                        "language": {
                            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Hungarian.json"
                        }

                    });

                });
            </script>
        </body>
    </html>
    <?php
}
mysqli_close($mysqli);
?>
