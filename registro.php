<?php
// Datos de conexión a MySQL (XAMPP)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_db";

// Conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

// Insertar datos
$sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "<div class='msg'>✅ Usuario registrado correctamente</div>";
    echo "<a href='index.html'>Volver</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
