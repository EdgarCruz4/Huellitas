<!doctype html>
<html lang="en"> 
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/dis_admin.css">
    <!-- Favicons -->
    <link href="assets/img/logo_02.png" rel="icon">
      <title>Empleado</title>
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
                    <h1><strong>Huellitas</strong></h1>
                    </br>
                    <div class="bot1" align="center">
                      <td>
                      <a href="admin.php"><button class="button">Administrador</button></a>
                      <a href="#"><button class="button">Empleado</button></a>
                      </td>
                    </div>
                  </div>

                  <form action="develop/php/ValidarEmpleado.php" method="post">
                    <div class="form-group first">
                      <label for="usuario">Usuario</label>
                      <input type="text" class="form-control" name="usuario" required>
                    </div class="mb-4">
                    <div class="form-group last mb-4">
                      <label for="password">Contraseña</label>
                      <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="bot2">
                      <button class="button_1" type="submit" >Iniciar sesión</button>
                    </div>
                    </br>
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
      <script src="develop/js/cookies.js"></script>
      <script src="develop/js/scriptsFB.js"></script>
      <script src="develop/js/login.js"></script>
  </body>
  
</html>