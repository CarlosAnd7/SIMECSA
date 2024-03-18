<!DOCTYPE html>
<html lang="es">
<?php session_start(); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIMECSA</title>

  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap Datatables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
  <!-- Bootstrap Datatables -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <script src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="./css/cards.css">

</head>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">SIMECSA</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="./index.php?pagina=1&categoria=">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Servicios</a>
      </li>
    </ul>

    <div class="navbar-end">
      <div class="navbar-item">
        <?php if (!empty($_SESSION["correo"])) { ?>
          <form action="./verCarrito.php">
            <button type="submit" href="Ver carrito" class="btn btn-success position-relative">
              <i class="fs-5 bi-cart-fill"></i>&nbsp;Ver carrito
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php
                include_once "funciones.php";
                $conteo = count(obtenerIdsDeProductosEnCarrito());
                if ($conteo > 0) {
                  printf($conteo);
                } else {
                  printf("0");
                }
                ?>
                <span class="visually-hidden">unread messages</span>
              </span>
            </button>
          </form>
        <?php } ?>
      </div>
      <div class="navbar-item dropdown">
        <?php if (empty($_SESSION["correo"])) { ?>
          <a name="" id="" class="btn btn-light" href="./login/" role="button"><i class="fs-4 bi-person-circle"></i> Iniciar Sesión</a>
        <?php } else { ?>

          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fs-5 bi-person-circle"></i>
              <?php echo ($_SESSION["correo"]); ?>
            </button>
            <ul class="dropdown-menu ">
              <li><a class="dropdown-item" href="./verPedidos.php">Mis Pedidos</a></li>
              <li><a class="dropdown-item" href="./datosCliente.php">Mis Datos</a></li>
              <li><a class="dropdown-item" href="./login/logout.php">Cerrar Sesión</a></li>
            </ul>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>