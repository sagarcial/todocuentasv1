<?php
// Incluir la biblioteca Spout (Asegúrate de que la biblioteca esté instalada)
require_once '../vendor/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

// Conectar a la base de datos
include 'credenciales.php';
$tiposerv = $_POST['tiposerv'];
$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha enviado un archivo
if (isset($_FILES['archivo_excel'])) {
    // Obtener el archivo Excel cargado
    $archivo_excel = $_FILES['archivo_excel']['tmp_name'];

    // Validar que el archivo sea un archivo Excel
    $file_info = pathinfo($_FILES['archivo_excel']['name']);
    if (strtolower($file_info['extension']) != 'xlsx') {
        die("El archivo debe ser un archivo Excel (xlsx).");
    }

    // Obtener el valor de "idserv" del formulario
    $idserv = $_POST['idserv'];

    // Crear un lector de Spout para el archivo Excel
    $reader = ReaderEntityFactory::createXLSXReader();

    // Abre el archivo Excel
    $reader->open($archivo_excel);

    // Inicializar una variable para contar los duplicados
    $duplicates = 0;

// ...

// Recorrer las filas del archivo Excel
foreach ($reader->getSheetIterator() as $sheet) {
    foreach ($sheet->getRowIterator() as $row) {
        if ($tiposerv === "completa") {
            // Obtener los valores de cada columna
            $cuenta = $row->getCellAtIndex(0)->getValue(); // Columna 1 (A)
            $contrasena = $row->getCellAtIndex(1)->getValue(); // Columna 2 (B)
            $pantalla = "N/A";
            $pin = "N/A"; // Columna 4 (D)
        } elseif ($tiposerv === "individual") {
            // Obtener los valores de cada columna
            $cuenta = $row->getCellAtIndex(0)->getValue(); // Columna 1 (A)
            $contrasena = $row->getCellAtIndex(1)->getValue(); // Columna 2 (B)
            $pantalla = $row->getCellAtIndex(2)->getValue(); // Columna 3 (C)
            $pin = $row->getCellAtIndex(3)->getValue(); // Columna 4 (D)
        }

        // Agregar los campos estado, fecha y fechavence
        $estado = "activo"; // Cambiar según tus requisitos
        $fecha = date("Y-m-d"); // Fecha actual
        $fechavence = "2023-12-31"; // Cambiar según tus requisitos

        // Verificar si el registro ya existe en la base de datos
        $check_query = "SELECT COUNT(*) AS count FROM cuentas WHERE cuenta = '$cuenta'";
        $check_result = mysqli_query($conexion, $check_query);

        if (!$check_result) {
            die("Error al verificar duplicados: " . mysqli_error($conexion));
        }

        $check_row = mysqli_fetch_assoc($check_result);
        $count = $check_row['count'];

        if ($count > 0) {
            // El registro ya existe, incrementar el contador de duplicados
            $duplicates++;
        } else {
            // El registro no existe, insertarlo en la base de datos
            $insert_query = "INSERT INTO cuentas (cuenta, contrasena, idserv, pantalla, pin, estado, fecha, fechavence) VALUES ('$cuenta', '$contrasena', '$idserv', '$pantalla', '$pin', '$estado', '$fecha', '$fechavence')";
            $result = mysqli_query($conexion, $insert_query);

            if (!$result) {
                die("Error al insertar datos: " . mysqli_error($conexion));
            }
        }
    }
}

// ...


    // Cerrar el lector de Spout
    $reader->close();

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    if ($duplicates > 0) {
        echo "<script>alert('Cuentas agregadas correctamente. Se encontraron $duplicates registros duplicados.'); window.location.href = '../ADM/pages/forms/cuentas.php';</script>";
    } else {
        echo "<script>alert('Cuentas agregadas correctamente.'); window.location.href = '../ADM/pages/forms/cuentas.php';</script>";
    }
} else {
    echo "No se ha enviado ningún archivo.";
}
?>
