

<head>
<link rel="stylesheet" href="../../dist/css/csspersn.css">
</head>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index2.html"  class="h1">
            <img src="../../../img/logo.png"   alt="Logo de COMPRAMEVE" width="260">
        </a>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php
          $nombrecapital = ucfirst($_SESSION['nombre']);
          $apellidocapital = ucfirst($_SESSION['apellido']);
    echo '' . $nombrecapital.' ' . $apellidocapital;
    ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="../../index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
             
              </p>
            </a>
 
          </li>
          <li class="nav-item">
            <a href="vendedor.php" class="nav-link">
              <i class="fa fa-plus-circle"></i>
              <p>
               Agregar Vendedor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cuentas.php" class="nav-link">
              <i class="fa fa-plus-circle"></i>
              <p>
               Agregar Cuentas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cuentaslistado.php" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
                Manejo general de Cuentas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reglaspreciosyproductos.php" class="nav-link">
              <i class="fa fa-tasks"></i>
              <p>
                Manejo General de Productos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="vendedorlistado.php" class="nav-link">
              <i class="fa fa-tasks"></i>
              <p>
                Manejo General de vendededores
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cerrarsesion.php" class="nav-link">
              <i class="fa fa-tasks"></i>
              <p>
                Cerrar Sesion
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>