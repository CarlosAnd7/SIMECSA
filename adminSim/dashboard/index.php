<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <?php
  include "./navbars/navbar.php";
  ?>

</head>

<body>
  <div id="wrapper">
    <div class="content-area">
      <div class="container-fluid">

        <div class="main">
          <div class="row sparkboxes mt-4 mb-4">
            <div class="col-md-4">
              <div class="box box1">
                <div id="spark1"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box box2">
                <div id="spark2"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box box3">
                <div id="spark3"></div>
              </div>
            </div>
          </div>

          <div class="row mt-5 mb-4">
            <div class="col-md-6">
              <div class="box">
                <div id="bar"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <div id="donut"></div>
              </div>
            </div>
          </div>

          <div class="row mt-4 mb-4">
            <div class="col-md-6">
              <div class="box">
                <div id="area"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <div id="line"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="./js/data.js"></script>
  <script src="./js/script.js"></script>

  <script src="./js/index.js"></script>

  <script></script>
</body>

</html>