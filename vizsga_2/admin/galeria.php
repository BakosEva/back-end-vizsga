<!DOCTYPE html>
<?php
session_start();
//var_dump($_SESSION);
 if (!isset($_SESSION['userid'])) {
 
     header("Location: ./login.php");
} 
?>
<html>
    <head>

        <title>Képfeltöltés a galériába</title>

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
       require_once '../conf.php';
       require_once '../adatfeldolgozas.php';
       ?>    
        <main>

            <div class="content py-5">
                <h1 class="text-center">Képfeltöltés a galériába</h1>
            </div>


            <div class="container-scroller">     
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py px-4 px-sm-5">

                        <form method="POST" enctype="multipart/form-data" action="./kepfeltoltes.php">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="anyfile">Kép feltöltése a galériába</label>
                                    <input class="form-control" type="file" name="anyfile" placeholder="Kép"/>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="sel">Galéria</label>
                                <select class="form-control" id="kategoria" name="kategoria">
                                    <?php
                                    $kategoria = urlapkategoria();
                                    var_dump($kategoria);
                                    if (isset($kategoria)) {
                                        foreach ($kategoria as $key => $value) {
                                            ?>
                                            <option><?php print($value['kategoria']); ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <input class="form-control" type="text" name="cim" placeholder="Cím"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-primary" type="submit" name="submit">Feltöltés</button>
                                </div>
                            </div>
                            <p><strong>Megjegyzés:</strong> Engedélyezett formátumok .jpg, .jpeg, .gif, .png max. méret 5 MB.</p>
                        </form>
                    </div>
                </div>
            </div>            
        </main>
    </body>
</html>
