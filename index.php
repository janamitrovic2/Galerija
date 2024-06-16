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
                            <a class="nav-link text-light" href="#">Pocetna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/pages/galerija.php">Galerija</a>
                        </li>
                    </ul>
                </nav>

            </div>

        </div>

        <div class="container-sm my-5 py-5 border">

            <div class="text-center">
                <div>
                    <h1>Unesi sliku!</h1>
                </div>
                <div class="mt-4">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
                        
                        <div class="py-4">
                            <div class="row justify-content-center mb-4">
                                <div class="col-md-5 col-12">
                                    <input class="form-control " type="file" name="slika" id="slika" placeholder="Izaberite fajl...">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-12 drop-zone text-center p-3" id="drop-zone">
                                    <span>... ili prevucite fajl ovde</span>
                                    <div class="preview" id="preview"></div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="mb-4">
                            <input class="w-25 mx-auto form-control" type="text" name="naziv" id="naziv" placeholder="Naziv slike">
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-sm">
                                <button type="reset" name="btnReset" class="btn btn-light">Reset</button>
                            </div>

                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
    <script src="script/script.js"></script>
    <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnSubmit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["slika"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["slika"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
        
            // Check file size
            if ($_FILES["slika"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
        
            // Allow certain file formats
            $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
            if(!in_array($imageFileType, $allowed_types)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars(basename($_FILES["slika"]["name"])). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    ?>
        
</body>
</html>