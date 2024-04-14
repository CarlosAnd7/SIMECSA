<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores</title>
    <?php
    include "../navbars/navbarLv2.php";
    ?>
</head>
<script src="./js/enviarForm.js"></script>

<body>
    <h1>Administradores</h1>
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="contenidoAdmins">
        <div class="card">
            <img class="card-img-top" src="../img/adminAdd.png" alt="...">
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Administrador</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formdata">
                        <div class="field">
                            <label class="label">Correo</label>
                            <input class="form-control" type="text" name="correo" id="correo" placeholder="" required>
                        </div>

                        <div class="field">
                            <label class="label">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="" required>

                        </div>
                        <div class="field">
                            <label class="label">Apellido paterno</label>
                            <input class="form-control" type="text" name="apellidoP" id="apellidoP" placeholder="" required>

                        </div>
                        <div class="field">
                            <label class="label">Apellido materno</label>
                            <input class="form-control" type="text" name="apellidoM" id="apellidoM" placeholder="" required>

                        </div>

                        <div class="field">
                            <label class="label">Contraseña</label>
                            <input class="form-control" type="text" name="pass" id="pass" placeholder="" required>

                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success" id="btnGuardarPass" onclick="enviarForm()">Guardar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
</body>

</html>
<script src="./js/cargarAdmins.js"></script>
<script src="../js/index.js"></script>