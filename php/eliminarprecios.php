<?php
// Verificar si se recibió el grupo_id desde el formulario
if (isset($_POST['grupo_id'])) {
    // Obtener el grupo_id enviado desde el formulario
    $grupo_id = $_POST['grupo_id'];

    // Definir las credenciales de la base de datos
    include 'credenciales.php';

    // Conectar a la base de datos
    $conexion = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

   // Inicializar una variable para llevar el seguimiento de las eliminaciones exitosas
   $eliminacionesExitosas = 0;

   // Eliminar el grupo coincidente en la tabla grupos
   $delete_grupo_query = "DELETE FROM grupos WHERE grupo_id = '$grupo_id'";
   if (mysqli_query($conexion, $delete_grupo_query)) {
       $eliminacionesExitosas++;
   } else {
    echo "<script>alert('Error, favor intentar nuevamente " . mysqli_error($conexion) . "'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
   }

   // Eliminar todos los registros coincidentes en la tabla preciosdiferenciales
   $delete_precios_query = "DELETE FROM preciosdiferenciales WHERE grupo_id = '$grupo_id'";
   if (mysqli_query($conexion, $delete_precios_query)) {
       $eliminacionesExitosas++;
   } else {
    echo "<script>alert('Error, favor intentar nuevamente " . mysqli_error($conexion) . "'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
   }

   // Cierra la conexión a la base de datos
   mysqli_close($conexion);

   // Mostrar un mensaje si ambas eliminaciones son exitosas
   if ($eliminacionesExitosas == 2) {
    echo "<script>alert('Las eliminaciones se han realizado con éxito.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
   }
} else {
    echo "<script>alert('Error, favor intentar nuevamente " . mysqli_error($conexion) . "'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
}
?>