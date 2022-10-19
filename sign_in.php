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
                <form action="php/consultas/addUsuario.php" method="POST">
                  <div class="form-group first">
                    <label for="username">Nombre del usuario</label>
                    <input type="text" name="nombre" class="form-control" id="username" required>
                  </div class="mb-4">

                  <div class="form-group last mb-4">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" required>
                  </div>

                  <div class="form-group last mb-4">
                    <label for="numero">Numero Telefonico</label>
                    <input type="text" class="form-control" id="apellido" max="10" min="10" required>
                  </div>

                  <div class="form-group last mb-4">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccions" required>
                  </div>

                  <div class="form-group last mb-4">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" required>
                  </div>

                  <div class="mb-3 mt-5">
                    <button type="submit"class="btn btn-pill text-white btn-block btn-primary"></button>
                  </div>

                  <div class="d-flex mb-4 align-items-center">
                    <span class="ml-auto"><a href="index.php" class="forgot-pass">Regresa a la pagina de inicio</a></span> 
                  </div>

                  <span class="d-block text-center my-4 text-muted"> O inicia sesión con Googlge</span>
                  
                  <div class="social-login text-center">
                    <a href="#" class="google">
                      <span class="icon-google mr-3"></span> 
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
  </body>
</html>