<?php
include 'conexionBD.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén la cantidad y el precio del formulario
    $qty = isset($_POST["qty"]) ? intval($_POST["qty"]) : 0;
    $precioUnitario = isset($_POST["precioUnitario"]) ? floatval($_POST["precioUnitario"]) : 0;

    // Realiza la multiplicación
    $total = $qty * $precioUnitario;

    // Puedes mostrar el resultado o realizar otras acciones aquí
    echo "Cantidad: $qty <br>";
    echo "Precio unitario: $precioUnitario <br>";
    echo "Total: $total <br>";
}


// Verifica si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén la cantidad y el precio del formulario
    $qty = isset($_POST["qty"]) ? intval($_POST["qty"]) : 0;
    $precioUnitario = isset($_POST["precioUnitario"]) ? floatval($_POST["precioUnitario"]) : 0;

    // Realiza la multiplicación
    $total = $qty * $precioUnitario;

    // Prepara la consulta SQL para insertar en la tabla de la base de datos
    $sql = "INSERT INTO operaciones (cantidad, precio_unitario, total) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincula los parámetros y ejecuta la consulta
    $stmt->bind_param("idd", $qty, $precioUnitario, $total);
    $stmt->execute();

    // Verifica si la inserción fue exitosa
    if ($stmt->affected_rows > 0) {
        echo "Los datos se han insertado en la base de datos correctamente.";
    } else {
        echo "Error al insertar datos en la base de datos.";
    }

    // Cierra la declaración
    $stmt->close();
}
?>
