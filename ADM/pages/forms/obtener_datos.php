<?php
// Incluye el archivo de credenciales
require '../../../php/credenciales.php';

// Crea una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recupera el ID proporcionado desde la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta la base de datos para obtener el saldo del usuario con id = 3
    $usuario_id = 3;
    $consulta_saldo = "SELECT saldo FROM usuarios WHERE id = $usuario_id";
    $resultado_saldo = $conn->query($consulta_saldo);

    if ($resultado_saldo->num_rows == 1) {
        $fila_saldo = $resultado_saldo->fetch_assoc();
        $saldo = $fila_saldo['saldo'];

        // Verifica si el saldo es suficiente
        $precio = $_GET['precio']; // Asume que $precio contiene el valor a descontar
        if ($saldo >= $precio) {
            // Realiza el descuento del saldo
            $nuevo_saldo = $saldo - $precio;

            // Consulta la base de datos para obtener un ID aleatorio de la tabla cuentas y calcular la duración
            $sql = "SELECT idcuentas, cuenta, contrasena, pantalla, pin, DATEDIFF(fechavence, fecha) AS duracion 
        FROM cuentas  
        WHERE idserv = $id AND estado != 'entregada' 
        ORDER BY RAND() LIMIT 1";

            $resultado = $conn->query($sql);
             
            if ($resultado->num_rows == 1) {
                $fila = $resultado->fetch_assoc();

                // Prepara los datos para ser devueltos como respuesta JSON
                $datos = array(
                    'cuenta' => $fila['cuenta'],
                    'contrasena' => $fila['contrasena'],
                    'pantalla' => $fila['pantalla'],
                    'pin' => $fila['pin'],
                    'duracion' => $fila['duracion']
                );

                echo json_encode($datos);


                $cuenta_id = $fila['idcuentas']; // Asumiendo que el ID de la cuenta se encuentra en la columna 'idcuentas'   
                $actualizar_cuenta = "UPDATE cuentas SET estado = 'entregada', idcliente = $usuario_id WHERE idcuentas = $cuenta_id";
                $conn->query($actualizar_cuenta);

                // Actualiza el saldo del usuario
                $actualizar_saldo = "UPDATE usuarios SET saldo = $nuevo_saldo WHERE id = $usuario_id";
                $conn->query($actualizar_saldo);
            } else {
                // Marca los valores del array como "agotados" si no se encuentran datos en la tabla cuentas
                $datos = array(
                    'cuenta' => 'agotado',
                    'contrasena' => 'agotado',
                    'pantalla' => 'agotado',
                    'pin' => 'agotado',
                    'duracion' => 'agotado'
                );

                echo json_encode($datos);
            }
        } else {
            // Marca los valores del array como "saldo insuficiente"
            $datos = array(
                'cuenta' => 'saldo insuficiente',
                'contrasena' => 'saldo insuficiente',
                'pantalla' => 'saldo insuficiente',
                'pin' => 'saldo insuficiente',
                'duracion' => 'saldo insuficiente'
            );

            echo json_encode($datos);
        }
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
