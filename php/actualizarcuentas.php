<?php
// Incluir el archivo de credenciales
include 'credenciales.php';

// Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idcuentas = $_POST["idcuentas"];
    $cuenta = $_POST["cuenta"];
    $cuentact = $_POST["cuentact"];
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
        // Actualizar datos basados en el campo 'cuenta'
        $query = "UPDATE cuentas SET cuenta = ?,contrasena = ?, idserv = ?, estado = ?, fecha = ?, fechavence = ? WHERE idcuentas = ?";

        // Preparar la sentencia
        if ($stmt = mysqli_prepare($conexion, $query)) {
            // Vincular los parámetros
            mysqli_stmt_bind_param($stmt, "ssisssi",$cuenta, $contrasena, $plataforma,$estado, $fecha, $fecha_nueva, $idcuentas);

            // Ejecutar la sentencia
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Cuenta actualizada correctamente.'); window.location.href = '../ADM/pages/forms/cuentaslistado.php';</script>";
            } else {
                echo "Error al actualizar los datos: " . mysqli_error($conexion);
            }

            // Cerrar la sentencia
            mysqli_stmt_close($stmt);
        } else {
            echo "Error al preparar la sentencia: " . mysqli_error($conexion);
        }
    } else {
        // Actualizar datos basados en los campos 'cuenta', 'pantalla' y 'pin'
        $query = "UPDATE cuentas SET idserv = ?, pantalla = ?, pin = ?, estado = ?, fecha = ?, fechavence = ? WHERE idcuentas = ?";

        // Preparar la sentencia
        if ($stmt = mysqli_prepare($conexion, $query)) {
            // Vincular los parámetros
            mysqli_stmt_bind_param($stmt, "isisssi", $plataforma, $pantalla, $pin, $estado, $fecha, $fecha_nueva,$idcuentas);

            // Ejecutar la sentencia
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Cuenta actualizada correctamente.'); window.location.href = '../ADM/pages/forms/cuentaslistado.php';</script>";
            } else {
                echo "Error al actualizar los datos: " . mysqli_error($conexion);
            }

            // Cerrar la sentencia
            mysqli_stmt_close($stmt);
        } else {
            echo "Error al preparar la sentencia: " . mysqli_error($conexion);
        }


        $queryn = "UPDATE cuentas SET  cuenta = ?, contrasena = ? WHERE cuenta = ?";

        // Preparar la sentencia
        if ($stmt = mysqli_prepare($conexion, $queryn)) {
            // Vincular los parámetros
            mysqli_stmt_bind_param($stmt, "sss",$cuenta, $contrasena,$cuentact);

            // Ejecutar la sentencia
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Cuenta actualizada correctamente.'); window.location.href = '../ADM/pages/forms/cuentaslistado.php';</script>";
            } else {
                echo "Error al actualizar los datos: " . mysqli_error($conexion);
            }

            // Cerrar la sentencia
            mysqli_stmt_close($stmt);
        } else {
            echo "Error al preparar la sentencia: " . mysqli_error($conexion);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
