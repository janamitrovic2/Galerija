<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Galerija slika</title>
</head>
<body>
    <div>

        
        <!-- HERO -->
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



        <!-- BODY -->
        <div class="container-sm my-5 py-5 shadow-lg text-center">

            <div class="">
                <h1>Galerija uploadovanih slika</h1>
            </div>

            <div class="my-4 py-4">

                <?php
                    $image_files = glob("../uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                    if(count($image_files)==0)
                    {
                        echo "<div class=''>Nema uploadovanih slika.</div>";
                    }
                ?>

                <div id="galerija" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                        
                            $image_files = glob("../uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                            foreach ($image_files as $index => $image) {
                                echo '<button type="button" data-bs-target="#galerija" data-bs-slide-to="' . $index . '" ' . ($index === 0 ? 'class="active"' : '') . '></button>';
                            }
                            
                        ?>
                    </div>

                    <div class="carousel-inner shadow-sm " style="background-color:#F8F8FF">
                        <?php
                            for($i = 0;$i<count($image_files);$i++) 
                            {
                                echo '<div class="carousel-item ' . ( $i==0 ? 'active' : '') . '">';
                                echo '<img src="' . $image_files[$i] . '" class="d-block mx-auto" height="700px"alt="Image">';
                                echo '</div>';
                            }
                        ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#galerija" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galerija" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
                
            </div>

        </div>
    </div>
</body>
</html>
