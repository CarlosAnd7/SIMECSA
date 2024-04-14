<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title>
    <?php
    include "../navbars/navbarLv2.php";
    ?>
</head>


<script src="./js/enviarForm.js"></script>

<body>
    <div class="container-fluid">
        <div id="exito" style="display:none">
            <div class="alert alert-success" role="alert">
                Datos actualizados con éxito!
            </div>
        </div>
        <div id="fracaso" style="display:none">
            <div class="alert alert-danger" role="alert">
                Error en el procesamiento de información. Intente mas tarde
            </div>
        </div>
        <div id="formulario" onload="llenaCampos()">
            <h1>Datos Personales</h1>
            <form method="post" id="formdata">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" oninput="enviarForm()">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellidoP" id="apellidoP" oninput="enviarForm()">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="apellidoM" id="apellidoM" oninput="enviarForm()">
                </div>
            </form>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cambiar Contraseña</button>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar Contraseña</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="field">
                        <label class="label">Contraseña Actual</label>

                        <input class="form-control" type="text" name="passActual" id="passActual" placeholder="" required>

                    </div>

                    <div class="field">
                        <label class="label">Contraseña Nueva</label>

                        <input class="form-control" type="text" name="passNueva" id="passNueva" placeholder="" required>

                    </div>

                    <div class="field">
                        <label class="label">Repite la contraseña nueva</label>
                        <input class="form-control" type="text" name="passNuevaRep" id="passNuevaRep" placeholder="" required>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="btnGuardarPass">Guardar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</body>



</html>
<script src="./js/datosAdmin.js"></script>
<script src="./js/formPass.js"></script>
<script src="../js/index.js"></script>