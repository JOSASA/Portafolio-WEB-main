<?php
include 'conexionBD.php';

session_start();

$email = "";
$pass = "";

$nameErr = "";

$nombre = "";
$apellido = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $nameErr = "El correo es requerido";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["pass"])) {
        $nameErr = "La contraseña es requerida";
    } else {
        $pass = $_POST["pass"];
    }

    if (strlen($email) < 1) {
        echo "El correo está en blanco";
    } else {
        // Utiliza parámetros seguros para prevenir inyección SQL
        $sql = "SELECT id, name, lastname, username, password, email FROM users where email = ? and password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Ha sido conectado";
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['nombre'] = $row['name']; // Asegúrate de usar el nombre correcto de la columna
            $_SESSION['apellido'] = $row['lastname']; // Asegúrate de usar el nombre correcto de la columna
            header("Location: principal.php");
            exit();
        } else {
            echo "Error en usuario o contraseña";
        }

        $stmt->close();
        $conn->close();
    }

} else {
    echo "No hay datos";
    echo "<a href='login.php'>Regresar</a>";
}
?>
