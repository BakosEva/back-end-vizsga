<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Étel és ital fotózás. Ínycsiklandó gasztrofotók, valamint az elkészítés pillanatainak megörökítése. Éttermek, bárok, kocsmák hangulat fotózása.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Faviconhoz -->
        <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
        <link rel="manifest" href="../site.webmanifest">
        <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <!-- Faviconhoz -->

        <!--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">-->

        <title>Adminisztráció | Vitéz Ádám - fotográfus</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- BS 4.6.0 -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../css/styles.css">
    <!--    <script src="js/jquery-3.6.0.min.js"></script>-->
        <script src="../js/js.js"></script>
    </head>

    <body>

        <?php
        include_once './admin_menu.php';
        require_once '../adatfeldolgozas.php';
         ob_start();
        ?>


        <main>

            <div class="content py-5">
                <h1 class="text-center">Adminisztráció</h1>

            </div>
        </main>

        <div class="container-scroller">     
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py px-4 px-sm-5">


                    <?php
                    //var_dump($_SESSION);
                    if (!isset($_SESSION['userid'])) {
                        ?>


                    <!--    <h6 class="fw-light">Felhasználónév: teszt</h6>
                        <h6 class="fw-light">Jelszó: teszt123</h6> -->
                        <form class="pt-3" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="felhasznalo" placeholder="Felhasználónév">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="jelszo" placeholder="Jelszó">
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >BEJELENTKEZÉS</button>
                            </div>

                        </form>

                        <?php
                     

                        if (isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
                            $salt = 'ez1kiegeszites';
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "vizsga_2";
                            $mysqli = mysqli_connect($servername, $username, $password, $dbname);
                            if (!$mysqli) {
                                die('A kapcsolat létrehozása sikertelen (E.T.) ' . mysqli_connect_error());
                            }

                            $sql = "SELECT id, felhasznalo, jelszo FROM login WHERE felhasznalo = '" . $_POST['felhasznalo'] . "'";
                            //print('<br>' . $sql . '<br>');
                            $result = mysqli_query($mysqli, $sql);
                            //eredményhalmaz lejött-e?
                            if ($result) {
                                //nem üres eredményhalmaz jött meg!
                                if (mysqli_num_rows($result) === 1) {
                                    $row = mysqli_fetch_assoc($result);
                                    //print(password_hash('teszt123' . $salt, PASSWORD_BCRYPT));
                                    //függvénnyel tárolt jelszó kiolvasása
                                    if (password_verify($_POST['jelszo'] . $salt, $row['jelszo'])) {
                                        $_SESSION['userid'] = $row['id'];
                                    }
                                }
                            }
                            header('Location: ./login.php');
                        }
                    } else {
                        print('Titkos rész...' . '<br>');

                        header('Location: ./galeria_admin.php');
                        //include_once './admin_menu.php';
                        //print('<a href="login.php?a=logout" > kilépés </a>');
                        //header('Location: ./admin_menu.php');
                        ob_flush();
                        ?>

                        
                        <?php
                        print('<a href="login.php?a=logout" > <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Kilépés az adminisztrációból</button> </a>');
                        print('<br>');
                        print('<a href="../index.php" > <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Vissza a főoldalra</button> </a>');
                    }
                    if (isset($_GET['a']) && $_GET['a'] == 'logout') {
                        unset($_SESSION['userid']);
                        header('Location: ../index.php');
                                       ob_flush();
                    }
                    ?> 

                </div>

            </div>
            <!-- page-body-wrapper ends -->
        </div>

        <footer>
            <div class="container text-center">
                <a href="mailto:vitez.adam@gmail.com?subject=Érdeklődés&"><i class="fa fa-envelope"></i></a>
                <a href="https://www.instagram.com/vitigreen/" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
        </footer>
    </body>

</html>
