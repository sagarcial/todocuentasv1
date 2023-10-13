<?php
include 'credenciales.php';

// Verificar la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $tipoServicio = $_POST["tipo_servicio"];
    $plataforma = $_POST["plataforma"];

    // Subir imagen
    $targetDir = "uploads/";  // Directorio donde se almacenarán las imágenes subidas
    $targetFile = $targetDir . basename($_FILES["imagen"]["name"]);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO servicios (Tiposerv, plataforma, imagen) VALUES ('$tipoServicio', '$plataforma', '$targetFile')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('El producto se creó exitosamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
    } else {
        echo "<script>alert('Error, favor intentar nuevamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>" . $conn->error;
    }
}

$conn->close();
?>
