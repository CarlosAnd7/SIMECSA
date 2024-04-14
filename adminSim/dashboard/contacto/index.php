<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <?php
    include "../navbars/navbarLv2.php";
    ?>
</head>


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
            <h1>Datos del Negocio</h1>
            <form method="post" id="formdata">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" name="telefono" id="telefono" oninput="enviarForm()">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">WhatsApp</label>
                    <input type="tel" class="form-control" name="whatsapp" id="whatsapp" oninput="enviarForm()">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" oninput="enviarForm()">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Correo</label>
                    <input type="text" class="form-control" name="correo" id="correo" oninput="enviarForm()">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Facebook</label>
                    <input type="text" class="form-control" name="facebook" id="facebook" oninput="enviarForm()">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
<script src="./js/datosEmpresa.js"></script>
<script src="./js/enviarForm.js"></script>
<script src="../js/index.js"></script>