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
    $fecha_actual = strftime('%d/%m/%Y');
    $hora_actual = date('H:i:s');

    // Restaurar la configuración regional y la zona horaria originales
    setlocale(LC_TIME, '');
    date_default_timezone_set('UTC');


    // Incluye el archivo de credenciales
require '../../../php/credenciales.php';

// Recupera el ID del enlace
if (isset($_GET['id'])) {
  $id = $_GET['id'];
 $idgrupo=2;
  // Conecta a la base de datos
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica la conexión
  if ($conn->connect_error) {
      die("Error de conexión a la base de datos: " . $conn->connect_error);
  }

  // Consulta la base de datos para obtener datos de la tabla servicios
  $sql = "SELECT * FROM servicios WHERE idserv = $id";
  $resultado = $conn->query($sql);
  
  if ($resultado->num_rows > 0) {
      // Muestra los datos
      $fila = $resultado->fetch_assoc();
          // Agrega más columnas según sea necesario
      } else {
        header('Location: iniciocer.php');
      echo "No se encontraron registros para el ID proporcionado.";
  }
    // Consulta adicional en la tabla preciosdiferenciales
    $sql2 = "SELECT * FROM preciosdiferenciales WHERE idserv = $id AND grupo_id = $idgrupo";
    $resultado2 = $conn->query($sql2);

    if ($resultado2->num_rows > 0) {
        // Maneja los resultados de la segunda consulta
        $fila2 = $resultado2->fetch_assoc();
            // Hacer algo con los datos de la tabla preciosdiferenciales
      
    } else {
      header('Location: iniciocer.php');
        // No se encontraron registros en preciosdiferenciales para el ID proporcionado.
    }
  // Cierra la conexión a la base de datos
  $conn->close();
} else {
  echo "ID no proporcionado en el enlace.";
}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice</title>

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

  <!-- Main Sidebar Container -->
  <?php include '../../menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
       
          </div>
          <div class="col-sm-6">
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> CUENTAS  
                    <small class="float-right">Fecha: <?php echo $fecha_actual; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
             
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                <form action="../../../php/creargrupo.php" id="formcuenta" method="post">
                <div class="card-body">
<div class="row">
<div class="col-4">
    <input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="cuenta" value="" disabled>
</div>
<div class="col-3">
    <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="contrasena" value="" disabled>
</div>
<div class="col-3">
    <input type="text" class="form-control" id="pantalla" name="pantalla" placeholder="pantalla" value="" disabled>
</div>
<div class="col-1">
    <input type="text" class="form-control" id="pin" name="pin" placeholder="pin" value="" disabled>
</div>
<div class="col-1">
    <input type="text" class="form-control" id="duracion" name="duracion" placeholder="duracion" value="" disabled>
</div>
<div class="col-1">
    <input type="text" class="form-control" id="idserv" name="idserv" placeholder="idserv" value="<?php echo $id; ?>" hidden>
</div>
</div>
</div>
 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Instrucciones generales:</p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  El uso adecuado de este perfil ayuda a que todos los usuarios puedan disfrutar sin contratiempos, ayúdanos usando solo un dispositivo para garantizar un buen servicio para todos.
                  </p>
                  <div id="valoresCopiados"></div>

                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Cuenta: <?php  echo "" .  $fila['Plataforma'] . " (". $fila['Tiposerv'] .") "; ?></p>
                  <div class="table-responsive">
                    <table class="table">
                    <th>Numero de Telefono:</th>
                    <td><input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" required ></td>
                    </table>
                    </div>
                  <div class="table-responsive">
                    <table class="table">
                    <th>Precio Unidad:</th>
                    <td><?php  echo " $" .  $fila2['precio']; ?></td>
                        <th>Total:</th>
                        <td>$<span id="total">0</span></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                <button type="button" id="comprar"  class="btn btn-default"><i class="fa fa-shopping-cart"></i> Comprar Ahora
                  </button>
                  <a href="iniciocer.php"  class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar</a>
                  </button>
                  <button type="button" id="whatsappButton" class="btn btn-success float-right"><i class="fa fa-comment"></i> Enviar a WhatsApp
                  </button>
                  <button type="button" class="btn btn-primary float-right" id="copyButton" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Copiar Valores
                  </button>
                </div>
              </div>
              </form>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
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
<script>
document.getElementById("copyButton").addEventListener("click", function() {
  // Get all the form elements
  var cuenta = document.getElementById("cuenta").value;
  var contrasena = document.getElementById("contrasena").value;
  var pantalla = document.getElementById("pantalla").value;
  var pin = document.getElementById("pin").value;
  var duracion = document.getElementById("duracion").value;

  // Create a structured message with the form data
  var formattedMessage = "Cuenta: " + cuenta + "\n" +
                         "Contraseña: " + contrasena + "\n" +
                         "Pantalla: " + pantalla + "\n" +
                         "Pin: " + pin + "\n" +
                         "Duración: " + duracion;

  // Create a temporary textarea element to copy the data to the clipboard
  var tempTextArea = document.createElement("textarea");
  tempTextArea.value = formattedMessage;
  document.body.appendChild(tempTextArea);

  // Select the text in the textarea and copy it to the clipboard
  tempTextArea.select();
  document.execCommand("copy");

  // Remove the temporary textarea
  document.body.removeChild(tempTextArea);

  alert("Informacion copiada en el portapapeles!");
});

document.getElementById("whatsappButton").addEventListener("click", function() {
  // Get the copied data from the clipboard
  var clipboardData = document.createElement("textarea");
  document.body.appendChild(clipboardData);
  clipboardData.value = document.getElementById("cuenta").value + " " +
                      document.getElementById("contrasena").value + " " +
                      document.getElementById("pantalla").value + " " +
                      document.getElementById("pin").value + " " +
                      document.getElementById("duracion").value;
  clipboardData.select();
  document.execCommand("copy");
  document.body.removeChild(clipboardData);

  var phoneNumber = document.getElementById("telefono").value;


  // Create the WhatsApp link with the formatted message
  var whatsappMessage = "Cuenta: " + document.getElementById("cuenta").value + " " +
                       "Contraseña: " + document.getElementById("contrasena").value + " " +
                       "Pantalla: " + document.getElementById("pantalla").value + " " +
                       "Pin: " + document.getElementById("pin").value + " " +
                       "Duración: " + document.getElementById("duracion").value;

  var whatsappLink = "https://wa.me/+57" + phoneNumber + "/?text=" + encodeURIComponent(whatsappMessage);

  // Redirect to the WhatsApp link
  window.location.href = whatsappLink;
});
</script>
<script>
var total = 0; // Inicializa la variable total

document.getElementById('comprar').addEventListener('click', function() {
    var id = document.getElementById('idserv').value;
    var precio = <?php echo json_encode($fila2['precio']); ?>; // Obtén el valor de $fila2['precio'] en JavaScript
    // Realizar una solicitud AJAX para obtener los datos desde el servidor
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'obtener_datos.php?id=' + id + '&precio=' + precio, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var datos = JSON.parse(xhr.responseText);
            if (datos) {
                document.getElementById('cuenta').value = datos.cuenta;
                document.getElementById('contrasena').value = datos.contrasena;
                document.getElementById('pantalla').value = datos.pantalla;
                document.getElementById('pin').value = datos.pin;
                document.getElementById('duracion').value = datos.duracion;

                // Verificar si cuenta es "agotado"
                if (datos.cuenta === "agotado" || datos.cuenta === "saldo insuficiente") {
                   
                } else {
                    // Suma el valor de precio al total
                    total += parseFloat(precio);
                }

                // Actualiza el valor en el elemento HTML
                document.getElementById('total').textContent = total;
            }
        }
    };
    xhr.send();
});
</script>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
