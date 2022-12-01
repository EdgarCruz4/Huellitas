<?php
require_once("develop/php/database.php");
$conexion = conexion();
session_start();
error_reporting(0);
$_SESSION['usuario'];
$vsesion = $_SESSION['usuario'];
if ($vsesion == null || $vsesion = '') {
  echo '<script language="javascript">alert("Inicia Sesión");window.location.href="admin.php"</script>';
  die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Animate On Scroll Library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Favicons -->
  <link href="assets/img/logo_02.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <!-- <link href="../assets/css/style.css" rel="stylesheet"> -->
  <link href=assets/css/tablas.css rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v4.9.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <div class="row">
          <div class="col"><img src="assets/img/Logo_01.png" class="img-fluid" alt=""></div>

          <div class="col">
            <h1 class="text-light"><a href="Admin.php"><span>Huellitas</span></a></h1>
          </div>

        </div>

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted scrollto" href="develop/php/destroyed.php">Cerrar de sesión</a></li>
          <li class="text_1"><a ><?php
           echo "" . $_SESSION['usuario']; ?></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <section>
    <section>

      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" >Catlogo</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" >Donaciones</button>
        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">




        <!-- =============================================CATALOGO===================================================== -->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div>
            <br>
            <!-- ==========================MODAL 1======================================== ¡-->
            <!-- Button trigger modal -->
            <button type="button" class="btn_btn-warning_bi_bi-pen" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Nuevo registro
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalC" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header" >
                    <h5 id="exampleModalLabel">Nuevo registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">


                  <form action="develop/php/RegMascotas.php" method="POST" name="form">
                      <div class="mb-2">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control" name="Foto" placeholder="" require>
                      </div>
                      <div class="mb-2">
                        <label class="form-label">Seleciona la especie: &nbsp;</label>
                        <select class="form-select" aria-label="Default select example" name="Especie">
                          <option value="Perro" selected>Perro</option>
                          <option value="Gato">Gato</option>
                        </select>
                      </div>
                      <div class="mb-2">
                        <label class="form-label">Seleciona el sexo: &nbsp;</label>
                        <select class="form-select" aria-label="Default select example" name="Sexo">
                          <option value="Macho">Macho</option>
                          <option value="Hembra">Hembra</option>
                        </select>
                      </div>
                      <div class="mb-2">
                        <input type="text" class="form-control" name="Nombre" placeholder="Nombre" required>
                      </div>
                      <div class="mb-2">
                        <input type="text" class="form-control" name="Color" placeholder="Color" required>
                      </div>
                      <div class="mb-2">
                        <input type="text" class="form-control" name="Peso" placeholder="Peso" required>
                      </div>
                      <div class="mb-2">
                        <input type="text" class="form-control" name="Edad" placeholder="Edad" require>
                      </div>
                      <br>
                      <div class="modal-footer">
                      <button type="submit" class="btn_btn-warning_bi_bi-pen">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- ========================== FIN MODAL 1======================================== ¡-->

          </div>
          <br>

          <table class="table table-hover table-condensed table-bordered" >
            <thead class="table" style="background-color: #02253C; color: #ffffff">
              <tr>
              <td>Foto</td>
                <td>Nombre</td>
                <td>Especie</td>
                <td>Sexo</td>
                <td>Peso</td>
                <td>Color</td>
                <td>Edad</td>
                <td>Editar</td>
                <td>Borrar</td>
              </tr>
            </thead>
            <?php
            $sql = "SELECT id,foto,nombre,raza,sexo,peso,color,edad
                    FROM mascotas";
            $resu = mysqli_query($conexion, $sql);
            while ($ver = mysqli_fetch_row($resu)) {
              $tipo = $ver[3];
              if ($tipo == "Gato") {
                $tipo = "gatos";
              } else {
                $tipo = "perros";
              }
            ?>

              <tr>
                <td><img src="<?php echo ('assets/img/' . $tipo . '/' . $ver[1]) ?>" width="120" alt="15"></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td><?php echo $ver[4] ?></td>
                <td><?php echo $ver[5].' Kilos' ?></td>
                <td><?php echo $ver[6] ?></td>
                <td><?php echo $ver[7].' Años' ?></td>


                <td>
                  <button class="btn_btn-danger_bi_bi-trash2" data-toggle="modal" data-target="#ModEditarMascotas<?php echo $ver[0]; ?>"> Editar</button>
                </td>
                <td>
                  <button id="btnBorrar" class="btn_btn-danger_bi_bi-trash3" data-toggle="modal" data-target="#ModEliminarMascotas<?php echo $ver[0]; ?>"> Borrar</button>
                </td>
              </tr>
              <?php require('ModEditarMascotas.php') ?>
              <?php require('ModEliminarMascotas.php') ?>
            <!-- ========================== FIN MODAL 1======================================== ¡-->

            <?php
            }
            ?>
            <!--  document.find-->
            <!--data-id=" " -->
          </table>

        </div>
        <!-- =============================================FIN CATALOGO===================================================== -->

        <!-- ==============================================DONACIONES===================================================== -->

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

          <div>
            <div>
              <br>
              <button type="button" class="btn_btn-warning_bi_bi-pen" data-bs-toggle="modal" data-bs-target="#DonacionesModal">
                Nuevo registro
              </button>

              <!-- Modal -->
              <div class="modal fade" id="DonacionesModal" tabindex="-1" aria-labelledby="DonacionesModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 id="DonacionesModalLabel" >Nuevo registro</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                      <form action="develop/php/RegDonaciones.php" method="POST" name="form">
                        <div class="mb-2">
                          <label class="form-label"></label>
                          <input type="text" class="form-control" name="Concepto" placeholder="Concepto">
                        </div>
                        <div class="mb-2">
                          <input type="numer" class="form-control" name="Cantidad" placeholder="Cantidad">
                        </div>
                        <br>
                        <button type="submit" class="btn_btn-warning_bi_bi-pen">Guardar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ========================== FIN MODAL 1======================================== ¡-->



            </div>
            <br>

            <table class="table table-hover table-condensed table-bordered ">
              <thead class="table" style="background-color: #02253C; color: #ffffff">
                <tr>
                <td>Concepto</td>
                  <td>Cantidad</td>
                  <td>Eliminar</td>

                </tr>
              </thead>
              <?php
              $sql = "SELECT id, concepto, cantidad
                    FROM donaciones";
              $resul = mysqli_query($conexion, $sql);
              while ($ver = mysqli_fetch_row($resul)) {
              ?>
                <tr>
                 
                  <td><?php echo $ver[1] ?></td>
                  <td><?php echo $ver[2] ?></td>
                  <td>
                    <button id="btnBorrar" class="btn_btn-danger_bi_bi-trash3" data-toggle="modal" data-target="#ModEliminarDonaciones<?php echo $ver[0]; ?>"> Borrar</button>
                  </td>
                </tr>
                <?php require('ModEliminarDonaciones.php') ?>
              <?php
              }
              ?>
            </table>
          </div>
        </div>
      </div>

    </section>

  </section>


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <p>
            <h5>Todos los Derechos Reservados. México 2022</h5>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Animate On Scroll Library -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="develop/js/cookies.js"></script>
  <script src="develop/js/indx.js"></script>
  <script scr="assets/bootstrap/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
    AOS.init();
  </script>
<script src="develop/js/jquery.min.js"></script>
<script src="develop/js/popper.min.js"></script>
<script src="develop/js/bootstrap.min.js"></script>
<script>
  window.onload = function() {
    killerSession();
  }

  function killerSession() {
    setTimeout("window.open('develop/php/destroyed.php','_top');", 9999999);
  }
</script>

</body>

</html>

