<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COMPRAMEVE</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="ADM/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="ADM/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="ADM/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-image: url('img/fondo.png');">
<div class="login-box">
  <!-- /.login-logo -->
  <div style="background-color:black;" class="card card-primary">
    <div  style="background-color:black;" class="card-header text-center">
        <a href="../../index2.html" class="h1">
            <img src="img/logo.png" alt="Logo de COMPRAMEVE" width="300">
        </a>
    </div>
    <!-- ...resto del contenido de la tarjeta... -->

    <div class="card-body">

      <form action="php/login.php" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" style="background-color:white; border-color:white; font-weight: 700; color:black" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="ADM/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="ADM/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="ADM/dist/js/adminlte.min.js"></script>
</body>
</html>
