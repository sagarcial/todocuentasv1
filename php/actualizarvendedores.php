<?php
// Incluir el archivo de credenciales
include 'credenciales.php';

// Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idusuario = $_POST["idvendedor"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $contrasena = md5($_POST["contrasena"]); // Convertir la contraseña a MD5
    $tipousuario = $_POST["tipousuario"];
    $tipovendedor = $_POST["tipovendedor"];
    $saldo = $_POST["saldo"];
    
    // Crear una conexión a la base de datos
    $conexion = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Actualizar datos en la tabla "usuarios"
    $query = "UPDATE usuarios SET nombre = ?, apellido = ?, usuario = ?, contrasena = ?, tipousuario = ?, tipovendedor = ?, saldo = ? WHERE id = ?";

    // Preparar la sentencia
    if ($stmt = mysqli_prepare($conexion, $query)) {
        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "ssssssii", $nombre, $apellido, $usuario, $contrasena, $tipousuario, $tipovendedor, $saldo, $idusuario);

        // Ejecutar la sentencia
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Usuario actualizado correctamente.'); window.location.href = '../ADM/pages/forms/vendedorlistado.php';</script>";
        } else {
            echo "Error al actualizar los datos: " . mysqli_error($conexion);
        }

        // Cerrar la sentencia
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la sentencia: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
