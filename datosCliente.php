<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMECSA</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    include("./navbar.php");
    ?>

    <link rel="stylesheet" href="./css/datosCliente.css">
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
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Numero de Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" id="telefono" oninput="enviarForm()">
                </div>
            </form>
            <button type="button" class="btn btn-warning modal-button" data-target="#modal2">Cambiar Contraseña</button>
        </div>
        <h1>Direcciones</h1>
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="contenidoDirecciones">
            <div class="card">
                <img src="./img/mapa.png" class="card-img-top" alt="...">
                <!-- Button trigger modal -->
                <a class="button is-primary modal-button" data-target="#modal">Agregar Dirección</a>
            </div>
        </div>
    </div>


    <div id="modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <header class="modal-card-head">
                <p class="modal-card-title">Registra tu nueva dirección</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <div class="box">
                <div class="field">
                    <label class="label">Calle</label>
                    <div class="control">
                        <input class="input" type="text" name="calle" id="calle" placeholder="Nombre de la calle" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Número Exterior</label>
                    <div class="control">
                        <input class="input" type="text" name="ne" id="ne" placeholder="#" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Número Interior</label>
                    <div class="control">
                        <input class="input" type="text" name="ni" id="ni" placeholder="Solo si es necesario (edificios/condominios)">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Código Postal</label>
                    <div class="control">
                        <input class="input" type="text" name="cp" id="cp" placeholder="" maxlength="5" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Colonia</label>
                    <div class="control">
                        <input class="input" type="text" name="colonia" id="colonia" placeholder="" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Ciudad</label>
                    <div class="control">
                        <input class="input" type="text" name="ciudad" id="ciudad" placeholder="" required>
                    </div>
                </div>
                <footer class="modal-card-foot">
                    <button class="button is-success" id="btnGuardar">Guardar</button>
                    <button class="button is-danger">Cancelar</button>
                </footer>

            </div>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <header class="modal-card-head">
                <p class="modal-card-title">Cambia tu contraseña</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <div class="box">
                <div class="field">
                    <label class="label">Contraseña Actual</label>
                    <div class="control">
                        <input class="input" type="text" name="passActual" id="passActual" placeholder="" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Contraseña Nueva</label>
                    <div class="control">
                        <input class="input" type="text" name="passNueva" id="passNueva" placeholder="" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Repite la contraseña nueva</label>
                    <div class="control">
                        <input class="input" type="text" name="passNuevaRep" id="passNuevaRep" placeholder="" required>
                    </div>
                </div>


                <footer class="modal-card-foot">
                    <button class="button is-success" id="btnGuardarPass">Guardar</button>
                    <button class="button is-danger">Cancelar</button>
                </footer>

            </div>
        </div>
    </div>
</body>



</html>
<script src="./js/formDatosCliente.js"></script>
<script src="./js/formularioDireccion.js"></script>
<script src="./js/formPass.js"></script>
<script>
    $(".modal-button").click(function() {
        var target = $(this).data("target");
        $("html").addClass("is-clipped");
        $(target).addClass("is-active");
    });

    $(".modal-close").click(function() {
        $("html").removeClass("is-clipped");
        $(this).parent().removeClass("is-active");
    });

    document.addEventListener('DOMContentLoaded', () => {
        // Functions to open and close a modal
        function openModal($el) {
            $el.classList.add('is-active');
        }

        function closeModal($el) {
            $el.classList.remove('is-active');
        }

        function closeAllModals() {
            (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                closeModal($modal);
            });
        }

        // Add a click event on buttons to open a specific modal
        (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
            const modal = $trigger.dataset.target;
            const $target = document.getElementById(modal);

            $trigger.addEventListener('click', () => {
                openModal($target);
            });
        });

        // Add a click event on various child elements to close the parent modal
        (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
            const $target = $close.closest('.modal');

            $close.addEventListener('click', () => {
                closeModal($target);
            });
        });

        // Add a keyboard event to close all modals
        document.addEventListener('keydown', (event) => {
            if (event.code === 'Escape') {
                closeAllModals();
            }
        });
    });
</script>