<?php
include 'credenciales.php';

// Verificar la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $contrasena = md5($_POST["contrasena"]); // Convertir la contraseña a MD5
    $tipousuario = $_POST["tipousuario"];
    $tipovendedor = $_POST["tipovendedor"];
    $saldo = $_POST["saldo"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellido, usuario, contrasena, tipousuario, tipovendedor, saldo)
            VALUES ('$nombre', '$apellido', '$usuario', '$contrasena', '$tipousuario', '$tipovendedor', '$saldo')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('El usuario se creo exitosamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>";
    } else {
        echo "<script>alert('Error, favor intentar nuevamente.'); window.location.href = '../ADM/pages/forms/reglaspreciosyproductos.php';</script>" . $conn->error;
    }
}

$conn->close();
?>
