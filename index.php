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

        <div class="container-sm my-5 border">

            <div class="py-5 text-center">
                <div>
                    <h1>Unesi sliku!</h1>
                </div>
                <div class="mt-4">
                    <form action="galerija.php" method="post" enctype="multipart/form-data">
                        
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
</body>
</html>