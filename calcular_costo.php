<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén la cantidad y el precio del formulario
    $qty = isset($_POST["qty"]) ? intval($_POST["qty"]) : 0;
    $precioUnitario = isset($_POST["precioUnitario"]) ? floatval($_POST["precioUnitario"]) : 0;

    // Realiza la multiplicación
    $total = $qty * $precioUnitario;

    // Puedes mostrar el resultado o realizar otras acciones aquí
    echo "Cantidad: $qty <br>";
    echo "Precio unitario: $precioUnitario <br>";
    echo "Total: $total";
}
?>

