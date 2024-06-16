<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Galerija slika</title>
</head>
<body>
    <div>
        <div class="container-fluid bg-primary text-center text-light p-5">

            <div class="mb-5">

                <h1 class="display-1">Galerija slika</h1>

            </div>

            <div class="text-light mt-5">

                <nav class="navbar navbar-expand-sm justify-content-center">
                    <ul class="nav-tabs navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../index.php">Pocetna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Galerija</a>
                        </li>
                    </ul>
                </nav>

            </div>

        </div>

        <div class="container-sm my-5 py-5 border text-center">
            <div class="">
                <h1>Galerija uploadovanih slika</h1>
            </div>
            <div class="">
                <div id="galerija" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>

                    <div class="carousel-inner">
                        <?php
                        $image_files = glob("uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                        $active = true;
                        foreach ($image_files as $index => $image) {
                            echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                            echo '<img src="' . $image . '" class="d-block w-100" alt="Slide ' . ($index + 1) . '">';
                            echo '</div>';
                            $active = false;
                        }
                        ?>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
</body>
</html>