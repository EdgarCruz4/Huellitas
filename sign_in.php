<!doctype html>
<html lang="en">
  <head>
    <!-- requiredd meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- Favicons -->
    <link href="assets/img/logo_02.png" rel="icon">
    <title>Sign in</title>
  </head> 
  <body>
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                <div class="mb-5" align="center">
                  <h3>Registrate en <strong>Huellitas</strong></h3>
                </div>
                <form action="#" method="POST" id="formularioDts">
                  <div class="form-group first">
                    <label for="username">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="username" required>
                  </div class="mb-4">
                  <div class="form-group last mb-4">
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" required>
                  </div>
                  <div class="form-group last mb-4">
                    <label for="numero">Numero Telefonico</label>
                    <input type="text" name="telefono" class="form-control" id="numero" max="10" min="10" required>
                  </div>
                  <div class="form-group last mb-4">
                    <label for="direccions">Dirección</label>
                    <input type="text" name="direccion" class="form-control" id="direccions" required>
                  </div>
                  <div class="form-group last mb-4">
                    <label for="email">Correo electronico</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                  </div>
                  <div>
                    <button class="button" type="submit">Registrate</button>
                  </div>
                  </br>
                  <div class="d-flex mb-4 align-items-center">
                    <span class="ml-auto"><a href="index.php" class="forgot-pass">Regresa a la pagina de inicio</a></span> 
                  </div>
                  <span class="d-block text-center my-4 text-muted"> O inicia sesión con Facebook</span>
                  <div class="social-login text-center">
                    <a onclick="onLoginFB();" href="#" class="facebook">
                      <span class="icon-facebook mr-3"></span>
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/login.js"></script>
    <script src="develop/js/scriptsFB.js"></script>
    <script src="develop/js/sign_in.js"></script>
  </body>
</html>