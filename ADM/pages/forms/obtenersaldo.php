<?php
// Conexión a la base de datos (reemplaza con tus propios valores)
require '../../../php/credenciales.php';

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID de usuario desde la solicitud POST o GET (asegúrate de validar y sanear los datos)
$usuario_id = $_GET['usuario_id'];

// Consulta SQL para obtener el saldo
$sql = "SELECT saldo FROM usuarios WHERE id = $usuario_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $saldo = $row["saldo"];

    // Crear un arreglo JSON para enviar el saldo
    $response = array("saldo" => $saldo);
    echo json_encode($response);
} else {
    echo "Usuario no encontrado";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
