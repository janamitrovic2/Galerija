<?php
    if (isset($_POST['btnSubmit']) )
    {
        echo "Uspešno smo pokupili podatke iz formulara na serveru GET metodom<br>";
        echo "Podaci <br> Email: ".$_GET['email']."</br> Password: " .$_GET['password'];
    }
    if(isset($_POST['btnReset'])){
        echo "klose";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
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

        <div class="container-sm my-5 border">

            

        </div>
    </div>
    <script src="script/script.js"></script>
</body>
</html>