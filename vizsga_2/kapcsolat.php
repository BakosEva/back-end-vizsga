<!DOCTYPE html>
<html lang="hu">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Budapesten és környékén a pillant megörökítése, egyénileg és párban. Rendezvények, események, műtermi fotózás. Küldjön üzenetet!">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Faviconhoz -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <!-- Faviconhoz -->

        <title>Kapcsolat | Vitéz Ádám - fotográfus</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- BS 4.6.0 -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="js/jquery-ui.min.css">

        <link rel="stylesheet" href="css/styles.css">
        <script src="js/js.js"></script>
    </head>

    <body class="kapcsolat">

        <?php
        include_once './header.php';
        require_once './adatfeldolgozas.php';
        ?>
        <main>
            <div class="content py-5 my-auto">
                <h1 class="text-center pb-5">Kapcsolat</h1>

                <div class="content-in px-3 mx-auto">
                    <form class="container-fluid" method="post" action="send.php">
                        <div class="form-group">
                            <label for="name">Név:</label>
                            <input type="text" class="form-control" id="nev" name="nev" required placeholder="Kovács István">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail cím:</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="valaki@akarmi.com">
                        </div>
                        <div class="form-group">
                            <label for="sel">Milyen fotózás iránt érdeklődik:</label>
                            <select class="form-control" id="kategoria" name="kategoria">
                                <?php
                                $kategoria = urlapkategoria();
                                //var_dump($kategoria);
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

                        <div class="form-group">
                            <label for="datepicker">Válassza ki a fotózás tervezett időpontját:</label><br>
                            <input type="text" name="datum" id="datepicker" required>
                        </div>

                        <div class="form-group">
                            <label for="comment">Üzenet:</label>
                            <textarea class="form-control" rows="5" id="comment" name="uzenet" required placeholder="Ide írja az üzenet..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-secondary">Üzenet küldése</button>
                    </form>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer">
                <div class="container text-center">
                    <a href="mailto:vitez.adam@gmail.com?subject=Érdeklődés&"><i class="fa fa-envelope"></i></a>
                    <a href="https://www.instagram.com/vitigreen/" target="_blank"><i class="fa fa-instagram"></i></a>

                </div>
            </div>
        </footer>
    </body></html>
