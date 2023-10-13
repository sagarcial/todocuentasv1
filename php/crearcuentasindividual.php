<?php
// Incluir el archivo de credenciales
include 'credenciales.php';

// Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cuenta = $_POST["cuenta"];
    $contrasena = $_POST["contrasena"];
    $plataforma = $_POST["plataforma"];
    $pantalla = $_POST["pantalla"];
    $pin = $_POST["pin"];
    $duracion = $_POST["duracion"];
    $estado = $_POST["estado"];
    $fecha = $_POST["fecha"];
    $fecha_nueva = date('Y-m-d', strtotime($fecha . ' + ' . $duracion . ' days'));

    
    // Crear una conexión a la base de datos
    $conexion = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Verificar si pantalla y pin son nulos
    if ($pantalla === "N/A" && $pin === "N/A") {
        // Comprobar si cuenta ya existe
        $consulta = "SELECT cuenta FROM cuentas WHERE cuenta = ?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "s", $cuenta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            echo "<script>alert('Cuenta duplicada. No se puede agregar.'); window.location.href = '../ADM/pages/forms/cuentas.php';</script>";
            exit;
        }
    } else {
        // Comprobar si cuenta, pantalla y pin ya existen
        $consulta = "SELECT cuenta FROM cuentas WHERE cuenta = ? AND pantalla = ? AND pin = ?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "ssi", $cuenta, $pantalla, $pin);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            echo "<script>alert('Cuenta duplicada. No se puede agregar.'); window.location.href = '../ADM/pages/forms/cuentas.php';</script>";
            exit;
        }
    }

    // Preparar la consulta SQL para insertar los datos en la tabla cuentas
    $query = "INSERT INTO cuentas (cuenta, contrasena, idserv, pantalla, pin,  estado, fecha, fechavence) VALUES (?, ?, ?, ?, ?,?, ?, ?)";

    // Preparar la sentencia
    if ($stmt = mysqli_prepare($conexion, $query)) {
        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "ssisisss", $cuenta, $contrasena, $plataforma, $pantalla, $pin, $estado, $fecha, $fecha_nueva);

        // Ejecutar la sentencia
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Cuenta agregada correctamente.'); window.location.href = '../ADM/pages/forms/cuentas.php';</script>";
        } else {
            echo "Error al insertar los datos: " . mysqli_error($conexion);
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
