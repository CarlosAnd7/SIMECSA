<!DOCTYPE html>
<html lang="en">
<?php
include("./navbar.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMECSA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/productoIndividual.css">
</head>


<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="imagen">

                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>

            </div>
            <div class="col-6">
                <div id="nombre">

                </div>
                <div class="table-responsive">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col">Precio</th>
                                <th scope="col" id="precio"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">Stock</td>
                                <td id="stock"></td>
                            </tr>

                            <tr>
                                <td>
                                    <div id="buttonAdd">

                                    </div>
                                </td>
                                <td>
                                    <div id="buttonDel">

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row" id="descripcion">
            <h3>Descripción</h3>
        </div>
    </div>
</body>

</html>

<script src="./js/productoIndividual.js"></script>