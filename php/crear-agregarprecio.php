<?php
// Definir las credenciales de la base de datos
include_once('credenciales.php');
// Conectar a la base de datos
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener los valores del formulario
$idserv = $_POST['idserv'];
$grupo_id = $_POST['grupo_id'];
$precio = $_POST['precio'];

// Consultar si ya existe una fila con los mismos valores de idserv y grupo_id
$query = "SELECT * FROM preciosdiferenciales WHERE idserv = '$idserv' AND grupo_id = '$grupo_id'";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    // Si existe una coincidencia, actualiza el precio
    $update_query = "UPDATE preciosdiferenciales SET precio = '$precio' WHERE idserv = '$idserv' AND grupo_id = '$grupo_id'";
    if (mysqli_query($conexion, $update_query)) {
        echo "<script>alert('El Precio Se actualizo Correctamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
    } else {
        echo "<script>alert('Error, favor intentar nuevamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>" . mysqli_error($conexion);
    }
} else {
    // Si no existe una coincidencia, inserta un nuevo registro
    $insert_query = "INSERT INTO preciosdiferenciales (idserv, grupo_id, precio) VALUES ('$idserv', '$grupo_id', '$precio')";
    if (mysqli_query($conexion, $insert_query)) {
        echo "<script>alert('El Precio Se Agrego Correctamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
    } else {
        echo "<script>alert('Error, favor intentar nuevamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>" . mysqli_error($conexion);
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
