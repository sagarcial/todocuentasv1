<?php
session_start(); // Iniciar sesión

if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["usuario"])) {
  // La sesión está activa y la variable de sesión "usuario" está definida, por lo que se permite el acceso a la página
} else {
  // La sesión no está activa o la variable de sesión "usuario" no está definida, por lo que se redirige a la página de inicio de sesión
  echo "<script>alert('Sesion expirada'); window.history.back();</script>";
  exit();
}
    // Cambiar la configuración regional a español
    setlocale(LC_TIME, 'es_ES.UTF-8');

    // Establecer la zona horaria a Bogotá
    date_default_timezone_set('America/Bogota');

    // Obtener la fecha y hora actual en español
    $fecha_actual = strftime('%d de %B de %Y');
    $hora_actual = date('H:i:s');

    // Restaurar la configuración regional y la zona horaria originales
    setlocale(LC_TIME, '');
    date_default_timezone_set('UTC');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php include '../../menu.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar Cuentas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Importar Cuentas </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../../../php/crearcuentas.php" method="post" enctype="multipart/form-data">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Importar Cuentas</label>
            <input type="file" class="form-control" name="archivo_excel" accept=".xls,.xlsx">
        </div>
        <div class="form-group">
                <label for="idserv">Plataforma</label>
                <select name="idserv" class="form-control" id="idserv" required>
                <?php
// Incluir el archivo de credenciales
include '../../../php/credenciales.php';

// Crear una conexión a la base de datos
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consultar las plataformas desde la tabla servicios
$query = "SELECT plataforma,idserv,Tiposerv FROM servicios";
$result = mysqli_query($conexion, $query);

if ($result) {
    // Imprimir las plataformas como opciones de selección
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['idserv'] . "'>" . $row['plataforma'] ." ". trim(str_replace('_', ' ', $row["Tiposerv"])) .  "</option>";
    }
} else {
    echo "Error al consultar las plataformas: " . mysqli_error($conexion);
}


?>

                </select>
                <div class="form-group">
                <label for="tiposerv">Tipo de cuenta </label>
                <select name="tiposerv" class="form-control" id="tiposerv" required>
    <option value="completa">Cuenta Completa</option>
    <option value="individual">Pantalla </option>

                </select>
                </div>
            </div>
        </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-warning">Enviar</button>
    </div>
</form>

        </div>
        </div>
        <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Agregar Cuentas </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../../../php/crearcuentasindividual.php" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="cuenta">Cuenta</label>
            <input type="text" name="cuenta" class="form-control" id="cuenta" required placeholder="Ingrese la cuenta">
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" class="form-control" id="contrasena" required placeholder="Ingrese la contraseña">
        </div>
        <div class="form-group">
                <label for="plataforma">Plataforma</label>
                <select name="plataforma" class="form-control" id="plataforma" required>
                <?php
date_default_timezone_set('America/Bogota');
$fecha = date('Y-m-d');

$result = mysqli_query($conexion, $query);

if ($result) {
    // Imprimir las plataformas como opciones de selección
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value='" . $row['idserv'] . "'>" . $row['plataforma'] ." ". trim(str_replace('_', ' ', $row["Tiposerv"])) .  "</option>";
    }
} else {
    echo "Error al consultar las plataformas: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

                </select>
            </div>
            <div class="form-group">
            <label for="contrasena">Pantalla</label>
            <input type="text" name="pantalla" class="form-control" value="N/A" id="pantalla" required placeholder="Ingrese el nombre de la pantalla">
        </div>
        <div class="form-group">
            <label for="pin">PIN</label>
            <input type="text" name="pin" class="form-control"  value="N/A"  required id="pin" placeholder="Ingrese el PIN">
        </div>
        <div class="form-group">
        <label for="duracion">Duracion</label>
        <input type="text" name="duracion" class="form-control" id="duracion" required placeholder="Ingrese la duracion" >
        </div>
        <div class="form-group">
            <input type="hidden" name="estado" class="form-control" id="estado" placeholder="Ingrese el estado" value="activo">
            <input type="hidden" name="fecha" class="form-control" id="fecha" placeholder="Ingrese el estado" value="<?php echo $fecha; ?>">

        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-warning">Enviar</button>
    </div>
</form>

            
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
