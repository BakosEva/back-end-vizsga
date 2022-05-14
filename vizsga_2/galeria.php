<!DOCTYPE html>
<html lang="hu">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Galériámban megtekinthetők: portré, esküvő, gasztronómia, termék, kávézó, természet, építészet, és utazással kapcsolatos fotók.">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Galéria | Vitéz Ádám - fotográfus</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- BS 4.6.0 -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> <!-- + More details link -->
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet">
    </head>

    <body>

        <?php
        include_once('./header.php');
        require_once './adatfeldolgozas.php';
        ?>

        <main>
            <!-- ======= My Portfolio Section ======= -->
            <section id="portfolio" class="portfolio">
                <div class="container">

                    <div class="section-title">
                        <h1 class="text-center p-5">Galéria</h1>
                    </div>

                    <ul id="portfolio-flters" class="d-flex flex-wrap justify-content-center">
                        <li data-filter="*" class="filter-active">Összes</li>

                        <?php 
                               /*
                        $kategoria = urlapkategoria();
                        print_r($kategoria);
                 
                        if (isset($kategoria)) {
                            foreach ($kategoria as $key => $value) {
                                ?>
                                <li data-filter=".<?php print("filter-" . $value['filter']); ?>"><?php print($value['kategoria']); ?></li>

                                <?php
                            }
                        }
                      */  ?>
                                    
                        <li data-filter=".filter-portre">Portré</li>
                        <li data-filter=".filter-eskuvo">Esküvő</li>
                        <li data-filter=".filter-gasztro">Gasztronómia</li>
                        <li data-filter=".filter-termek">Termék</li>
                        <li data-filter=".filter-kavezo">Kávézó</li>
                        <li data-filter=".filter-termeszet">Természet</li>
                        <li data-filter=".filter-epiteszet">Építészet</li>
                        <li id="utazas" data-filter=".filter-utazas">Utazás</li> 
                    </ul>

                    <div class="row portfolio-container">

                        <?php
                        $galeria = selectfoto();
                        if (isset($galeria)) {
                            foreach ($galeria as $key => $value) {
                                ?>
                                <div class="col-lg-4 col-md-6 portfolio-item <?php print("filter-" . $value['filter']); ?>">
                                    <div class="portfolio-img"><img src="img/galeria/<?php print($value['filename']); ?>" class="img-fluid" alt="<?php print($value['kategoria']); ?>"></div>
                                    <div class="portfolio-info">
                                        <h4><?php print($value['cim']); ?></h4>
                                        <p><?php print($value['kategoria']); ?></p>
                                        <a href="img/galeria/<?php print($value['filename']); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?php print($value['cim']); ?>"><i class="bx bx-plus"></i></a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                     
                    </div>

                </div>
            </section>

        </main>

        <footer>
            <div class="container text-center">
                <a href="mailto:vitez.adam@gmail.com?subject=Érdeklődés&"><i class="fa fa-envelope"></i></a>
                <a href="https://www.instagram.com/vitigreen/" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
        </footer>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/counterup/counterup.min.js"></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/venobox/venobox.min.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

</html>
