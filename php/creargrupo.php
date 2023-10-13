<?php
include 'credenciales.php';

// Verificar la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombreGrupo = $_POST["nombre_grupo"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO grupos (nombre) VALUES ('$nombreGrupo')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('El grupo se creó exitosamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
    } else {
        echo "<script>alert('Error, favor intentar nuevamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>" . $conn->error;
    }
}

$conn->close();
?>
