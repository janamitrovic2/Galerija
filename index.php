<?php

    $target_dir="uploads/";
    if(!is_dir($target_dir)){
        mkdir($target_dir,0777,true);
    }
    ## ukoliko ne postoji folder napravi ga
    ## files["name"]["name"] vraca puno ime fajla
    // echo(($_FILES["slika"]["name"]))."<br>"; opravdanje.jpg
    // echo(basename($_FILES["slika"]["name"]))."<br>"; opradanje.jpg
    // echo($target_file)."<br>";
    // echo($imageFileType); jpg
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


        <!-- HERO -->
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
                            <a class="nav-link text-light" href="pages/galerija.php">Galerija</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>



        <!-- BODY -->
        <div class="container-sm my-5 py-5 shadow-lg">

            <div class="text-center">

                <div>
                    <h1>Unesi sliku!</h1>
                </div>

                <div class="my-4">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                        <div class="py-4">

                            <div class="row justify-content-center mb-4">
                                <div class="col-md-5 col-12">
                                    <input class="form-control" type="file" name="slika" id="slika" placeholder="Izaberite fajl...">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-12 drop-zone p-3" id="drop-zone">
                                    <span id="dropZoneText">... ili prevucite fajl ovde</span>
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
                                <button type="reset" id="reset" name="btnReset" class="btn btn-light">Reset</button>
                            </div>
                        </div>

                    </form>
                    
                </div>

                <div class="" id="upozorenja">

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnSubmit"])) 
                    {
                        if(isset($_POST["naziv"]) && htmlspecialchars($_POST["naziv"]!=""))
                        {
                            
                            if(isset($_FILES['slika']) && $_FILES["slika"]["error"] == UPLOAD_ERR_OK)
                            {
                                $ime= $_POST['naziv']; // uzima ime iz text box
                                $_FILES['slika']['name']=$ime.'.'.strtolower(pathinfo($_FILES['slika']['name'], PATHINFO_EXTENSION)); //promena imena slike
                                $target_file = $target_dir.basename($_FILES["slika"]["name"]); # puna putanja do uploadovanog fajla
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); #ekstenzija tipa - jpg
                                $uploadOk = 1;


                                // da li postoji slika
                                if (file_exists($target_file)) {
                                    echo "<div class='alert alert-danger'>Fajl s s istim imenom vec postoji.</div>";
                                    $uploadOk = 0;
                                }

                                
                                // provera da li je slika, da li prelazi 5MB i da li je zeljenog formata pristupom preko $_FILES['slika']
                                $check = getimagesize($_FILES["slika"]["tmp_name"]);
                                if ($check !== false) 
                                {
                                    if ($_FILES["slika"]["size"] > 5000000) 
                                    {
                                        echo "<div class='alert alert-danger'>Slika prelazi 5MB.</div>";
                                        $uploadOk = 0;
                                    }
                                    if($imageFileType!= "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
                                    //if(!in_array($_FILES["slika"]["type"],['image/png','image/jpg','image/jpeg','image/giff'])
                                    {
                                        echo "<div class='alert alert-danger'>Slika nije jpg/jpeg/png/gif formata.</div>";
                                        $uploadOk = 0;
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>Niste uneli sliku</div>";
                                    $uploadOk = 0;
                                }

                                if ($uploadOk != 0 ) 
                                {
                                    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
                                        echo "<div class='alert alert-success'>Slika". htmlspecialchars(basename($_FILES["slika"]["name"])). " je uploadovana.</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Sorry, your file was not uploaded.</div>";
                                    }
                                } 
                                
                            }
                            else
                                echo "<div class='alert alert-danger'>Unesite sliku</div>";

                            
        
                        }
                        else
                            echo "<div class='alert alert-danger'>Unesite novo ime vase slike</div>";
                    }
                    ?>
                </div>

            </div>

        </div>



    </div>

    <script src="script/script.js"></script>
    
</body>
</html>
