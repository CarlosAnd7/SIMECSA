<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMECSA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<?php
include("./navbar.php");
?>

<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner" id="espacioImagen">
                                
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ps-lg-10">

                        <!-- Heading -->
                        <div id="espacioNombre">

                        </div>
                        

                        <!-- Price -->
                        <div class="mb-7" id="precioItem">
                            
                        </div>

                        <!-- Form -->
                        <form>
                            <div class="form-group">

                            </div>
                            <div class="form-group">

                                
                                </div>



                                <div class="row gx-5 mb-7">
                                    <div class="col-12 col-lg-auto" id="buttonDel">

                                    </div>
                                    <div class="col-12 col-lg-auto" id="buttonDiv">

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-11">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Nav -->
                <div class="nav nav-tabs nav-overflow justify-content-start justify-content-md-center border-bottom">
                    <a class="nav-link active" data-bs-toggle="tab" href="#descriptionTab">
                        Descripción
                    </a>
                    <a class="nav-link" data-bs-toggle="tab" href="#sizeTab">
                        Marca
                    </a>
                    <a class="nav-link" data-bs-toggle="tab" href="#shippingTab">
                        Garantia
                    </a>
                </div>

                <!-- Content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="descriptionTab">
                        <div class="row justify-content-center py-9">
                            <div class="col-12 col-lg-10 col-xl-8">
                                <div class="row">
                                    <div class="col-12" id="descripcionItem">

                                        

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- List -->
                                        <ul class="list list-unstyled mb-md-0 text-gray-500">
                                            <li>
                                                <strong class="text-body">SKU</strong>:
                                            </li>
                                            <li>
                                                <strong class="text-body">Occasion</strong>:
                                            </li>
                                            <li>
                                                <strong class="text-body">Country</strong>:
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- List -->
                                        <ul class="list list-unstyled mb-0">
                                            <li>
                                                <strong>Outer</strong>: 
                                            </li>
                                            <li>
                                                <strong>Lining</strong>:
                                            </li>
                                            <li>
                                                <strong>CounSoletry</strong>:
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sizeTab">
                        <div class="row justify-content-center py-9">
                            <div class="col-12 col-lg-10 col-xl-8">
                                <div class="row">
                                    <div class="col-12 col-md-6">

                                        <!-- Text -->
                                        <p class="mb-4">
                                            <strong>X</strong>
                                        </p>

                                        <!-- List -->
                                        <ul class="mb-md-0 text-gray-500">
                                            <li>
                                                
                                            </li>
                                            <li>
                                               
                                            </li>
                                            <li>
                                                
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Text -->
                                        <p class="mb-4">
                                            <strong></strong>
                                        </p>

                                        <!-- List -->
                                        <ul class="list-unstyled text-gray-500">
                                            
                                        </ul>                                       

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="shippingTab">
                        <div class="row justify-content-center py-9">
                            <div class="col-12 col-lg-10 col-xl-8">

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Shipping Options</th>
                                                <th>Delivery Time</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Standard Shipping</td>
                                                <td>Delivery in 5 - 7 working days</td>
                                                <td>$8.00</td>
                                            </tr>
                                            <tr>
                                                <td>Express Shipping</td>
                                                <td>Delivery in 3 - 5 working days</td>
                                                <td>$12.00</td>
                                            </tr>
                                            <tr>
                                                <td>1 - 2 day Shipping</td>
                                                <td>Delivery in 1 - 2 working days</td>
                                                <td>$12.00</td>
                                            </tr>
                                            <tr>
                                                <td>Free Shipping</td>
                                                <td>
                                                    Living won't the He one every subdue meat replenish
                                                    face was you morning firmament darkness.
                                                </td>
                                                <td>$0.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Caption -->
                                <p class="mb-0 text-gray-500">
                                    May, life blessed night so creature likeness their, for. <a class="text-body text-decoration-underline" href="#!">Find out more</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
</body>

</html>
<script src="./js/productoIndividual.js"></script>