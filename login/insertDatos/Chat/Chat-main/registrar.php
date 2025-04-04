<?php
session_start();
include 'bd.php';

// Verificar si se envió el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    // Validar que los campos obligatorios no estén vacíos
    if (!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($contraseña)) {
        // Verificar si el correo ya está registrado
        $consulta = "SELECT id FROM usuarios WHERE correo = ?";
        $declaracion = $conexion->prepare($consulta);
        $declaracion->bind_param("s", $correo);
        $declaracion->execute();
        $resultado = $declaracion->get_result();

        if ($resultado->num_rows > 0) {
            echo "<script>alert('El correo electrónico ya está registrado. Por favor, usa otro.');</script>";
        } else {
            // Encriptar la contraseña y registrar el usuario
            $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);
            $consulta = "INSERT INTO usuarios (nombre, apellido, correo, telefono, contraseña) VALUES (?, ?, ?, ?, ?)";
            $declaracion = $conexion->prepare($consulta);
            $declaracion->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $contraseña_encriptada);

            if ($declaracion->execute()) {
                echo "<script>alert('Usuario registrado exitosamente. Por favor, inicia sesión.'); window.location.href='inicio.php';</script>";
            } else {
                echo "<script>alert('Error al registrar el usuario: " . $declaracion->error . "');</script>";
            }
        }
        $declaracion->close();
    } else {
        echo "<script>alert('Por favor, completa todos los campos obligatorios.');</script>";
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>