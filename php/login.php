<?php
session_start(); // Iniciar sesión

include 'credenciales.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

date_default_timezone_set('America/Bogota'); // Establecer la zona horaria a Colombia

if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $query = "SELECT * FROM usuarios WHERE usuario=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();

        // Verificar si la contraseña ingresada coincide con el hash MD5 en la base de datos
        if (md5($contrasena) == $fila["contrasena"]) {
            // Almacenar el nombre de usuario y el tipo de usuario en sesiones
            $_SESSION["usuario"] = $fila["usuario"];
            $_SESSION["tipo"] = $fila["tipousuario"];

            if ($fila["tipousuario"] == "admin") {
                // Si el tipo de usuario es "admin", redirigir a la página de administrador
                header("Location: ../ADM/index.php");
                exit();
            } else {
                // Si el tipo de usuario es diferente, redirigir a la página de vendedor
                header("Location: ../Vendedor/index.php");
                exit();
            }
        } else {
            // Contraseña incorrecta, redirigir al usuario a index.php con un mensaje de error
            echo "<script>alert('Usuariono existente, Intentelo de nuevo.'); window.history.back();</script>";
            exit();
        }
    } else {
        // Si el usuario no existe en la base de datos, redirigir al usuario a index.php con un mensaje de error
        echo "<script>alert('Contraseña incorrecta, Intentelo de nuevo.'); window.history.back();</script>";
        exit();
    }
} else {
    // Si no se enviaron los datos del formulario, redirigir al usuario a index.php
    echo "<script>alert('No se envio la informacion, intentelo de nuevo'); window.history.back();</script>";
    exit();
}

$stmt->close();
$conn->close();
?>
