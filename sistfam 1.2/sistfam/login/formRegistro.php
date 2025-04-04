

<?php
if (isset($_POST['save'])) {
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$email = $_POST['Email'];
$telefono = $_POST['Telefono'];
$contraseña = $_POST['Contraseña'];

$conexion = conectarBaseDatos();


$sql = "INSERT INTO registroUser (Nombre, Apellido, Email, Telefono, Contraseña) values (?,?,?,?,?)" ;
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssss", $nombre, $apellido, $email, $telefono, $contraseña);

if ($stmt->execute()) {
    echo "<script>alert('Usuario registrado exitosamente.')</script>";
} else {
    echo "<script>alert(Error: )</script>" . $stmt->error;
}

$stmt->close();
$conexion->close();
}