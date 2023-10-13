<?php
// Verificar si se recibió el idcuentas desde el formulario
if (isset($_POST['idcuentas'])) {
    // Obtener el idcuentas enviado desde el formulario
    $idcuentas = $_POST['idcuentas'];

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

    // Eliminar el registro coincidente en la tabla cuentas
    $delete_cuenta_query = "DELETE FROM cuentas WHERE idcuentas = '$idcuentas'";
    if (mysqli_query($conexion, $delete_cuenta_query)) {
        $eliminacionesExitosas++;
    } else {
        echo "<script>alert('Error al eliminar la cuenta de la tabla cuentas: " . mysqli_error($conexion) . "'); window.location.href = '../ADM/pages/forms/cuentaslistado.php';</script>";
    }

    // Aquí puedes agregar más operaciones de eliminación si es necesario
    // Por ejemplo, eliminar registros en otras tablas relacionadas con 'idcuentas'

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);

    // Mostrar un mensaje si la eliminación es exitosa
    if ($eliminacionesExitosas > 0) {
        echo "<script>alert('La eliminación se ha realizado con éxito.'); window.location.href = '../ADM/pages/forms/cuentaslistado.php';</script>";
    }
} else {
    echo "No se recibió el idcuentas desde el formulario.";
}
?>
