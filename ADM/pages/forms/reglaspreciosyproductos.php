<?php
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
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

   <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
         <style>
        .producto-imagen img {
            max-width: 50%;
            height: auto;
        }
       

        </style>
 
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

  <!-- Main Sidebar Container -->
  <?php include '../../menu.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manejo General de Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manejo General de Productos</li>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Crear Grupo de Precios</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../../../php/creargrupo.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre_grupo">Nombre del Grupo</label>
                        <input type="text" name="nombre_grupo" class="form-control" id="nombre_grupo" placeholder="Ingrese el nombre del grupo">
                    </div>
    
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Grupos de Precios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <div class="container">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th >#</th>
                    <th >Nombre</th>
                    <th >Eliminar</th>
                  </tr>
                  </thead>
                  <tbody>
    <?php
    // Conexión a la base de datos
    include '../../../php/credenciales.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener registros de la tabla grupos
    $grupoSql = "SELECT nombre,grupo_id FROM grupos";
    $grupoResult = $conn->query($grupoSql);
    $eliminacionesExitosas = 1;
    if ($grupoResult->num_rows > 0) {
        while ($grupoRow = $grupoResult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $eliminacionesExitosas++ . '</td>';
            echo '<td>' . $grupoRow["nombre"] . '</td>';
            echo '<td> <form action="../../../php/eliminarprecios.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="grupo_id" class="form-control" value="' . $grupoRow["grupo_id"] . '" id="grupo_id">
            <button type="submit" class="btn btn-block btn-danger">Eliminar</button>
        </form> </td>';
            echo '</tr>';
        }
    }

    $conn->close();
    ?>
</tbody>
                  <tfoot>
                  <tr>
                  <tr>
                    <th >#</th>
                    <th >Nombre</th>
                    <th >Eliminar</th>
                  </tr>
                  </tfoot>
                </table>

    
    </div>
    </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Input addon -->
           
            <!-- /.card -->
            <!-- Horizontal Form -->
           
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
          
            <!-- /.card -->

         
            <!-- /.card -->

            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">La hora actual es:</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <h3> <?php echo $hora_actual; ?></h5>

              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">La fecha actual es:</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <h3>  <?php echo   $fecha_actual; ?></h3>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Crear Plataforma</h3>
              </div>
              <div class="card-body">
                <form action="../../../php/crearproducto.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="form-group">
                          <label for="tipo_servicio">Tipo de Servicio</label>
                          <select name="tipo_servicio" class="form-control" id="tipo_servicio">
                              <option value="pantalla">Pantalla</option>
                              <option value="cuenta_completa">Cuenta Completa</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="plataforma">Plataforma</label>
                          <input type="text" name="plataforma" class="form-control" id="plataforma" placeholder="Ingrese la plataforma">
                      </div>
                      <div class="form-group">
                          <label for="imagen">Imagen del Producto</label>
                          <input type="file" name="imagen" class="form-control-file" id="imagen">
                      </div>
        
                      <button type="submit" class="btn btn-primary">Enviar</button>
               
              </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
            <!-- general form elements disabled -->
           
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Plataformas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th >Plataforma</th>
                    <?php
            // Conexión a la base de datos
            include '../../../php/credenciales.php';
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Obtener nombres de grupos desde la tabla grupos
            $sql = "SELECT nombre,grupo_id FROM grupos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $grupo_id = $row["grupo_id"];
                    echo '<th>' . $row["nombre"] . '</th>';
                }
            }
          
            $conn->close();
            ?>
            <th >Eliminar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
            // Conexión a la base de datos
            include '../../../php/credenciales.php';
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Obtener registros de la tabla servicios
            $sql = "SELECT plataforma,imagen,Tiposerv,idserv FROM servicios";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td style="width: 400px;"><img src="../../../php/' . $row["imagen"] . '" style="width: 10%;" alt="Imagen"> '. $row["plataforma"] .'  ('. trim(str_replace('_', ' ', $row["Tiposerv"])) . ') </td>';
   

              // Obtener nombres de grupos desde la tabla grupos
        $grupoSql = "SELECT nombre,grupo_id FROM grupos";
        $grupoResult = $conn->query($grupoSql);
        if ($grupoResult->num_rows > 0) {
          while ($grupoRow = $grupoResult->fetch_assoc()) {
              echo '<td>'; // Abre la celda para el valor del grupo

              // Consulta para obtener el precio desde preciosdiferenciales
              $precioSql = "SELECT precio FROM preciosdiferenciales WHERE idserv = " . $row["idserv"] . " AND grupo_id = " . $grupoRow["grupo_id"];
              $precioResult = $conn->query($precioSql);

              if ($precioResult->num_rows > 0) {
                  $precioRow = $precioResult->fetch_assoc();
                  echo '<form action="../../../php/crear-agregarprecio.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="idserv" class="form-control" value="' . $row["idserv"] . '" id="idserv">
                  <input type="hidden" name="grupo_id" class="form-control" value="' . $grupoRow["grupo_id"] . '" id="grupo_id">
                  <input type="text"  name="precio" class="form-control" value="' . $precioRow["precio"] . '" id="precio">
                  <button type="submit" class="btn btn-primary">enviar</button>
              </form>'; // Imprime el precio obtenido
              } else {
                echo '<form action="../../../php/crear-agregarprecio.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idserv" class="form-control" value="' . $row["idserv"] . '" id="idserv">
                <input type="hidden" name="grupo_id" class="form-control" value="' . $grupoRow["grupo_id"] . '" id="grupo_id">
                <input type="text" name="precio" class="form-control"  id="precio">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>'; // Si no hay coincidencias, imprime "N/A"
              }
              echo '</td>'; // Cierra la celda
                
            
            }
           
        }
        echo '<td> <form action="../../../php/eliminarproductos.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idserv" class="form-control" value="' . $row["idserv"] . '" id="serv">
        <button type="submit" class="btn btn-block btn-danger">Eliminar</button>
    </form>  </td>';
        echo '</tr>';
                }
            }
            

            $conn->close();
            ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th >Plataforma</th>
                    <?php
            // Conexión a la base de datos
            include '../../../php/credenciales.php';
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Obtener nombres de grupos desde la tabla grupos
            $sql = "SELECT nombre FROM grupos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<th>' . $row["nombre"] . '</th>';
                }
            }

            $conn->close();
            ?>
             <th >Eliminar</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
