<?php
// Verificar si se recibió el grupo_id desde el formulario
if (isset($_POST['idserv'])) {
    // Obtener el grupo_id enviado desde el formulario
    $idserv = $_POST['idserv'];

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

    // Eliminar el servicio coincidente en la tabla servicios
    $delete_servicio_query = "DELETE FROM servicios WHERE idserv = '$idserv'";
    if (mysqli_query($conexion, $delete_servicio_query)) {
        $eliminacionesExitosas++;
    } else {
        echo "<script>alert('Error al eliminar el servicio de la tabla servicios: " . mysqli_error($conexion) . "'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
    }

    // Eliminar todos los registros coincidentes en la tabla preciosdiferenciales
    $delete_precios_query = "DELETE FROM preciosdiferenciales WHERE idserv = '$idserv'";
    if (mysqli_query($conexion, $delete_precios_query)) {
        $eliminacionesExitosas++;
    } else {
        echo "<script>alert('Error al eliminar registros coincidentes de la tabla preciosdiferenciales: " . mysqli_error($conexion) . "'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);

    // Mostrar un mensaje si ambas eliminaciones son exitosas
    if ($eliminacionesExitosas == 2) {
        echo "<script>alert('Las eliminaciones se han realizado con éxito.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
    }
} else {
    echo "No se recibió el idserv desde el formulario.";
}
?>