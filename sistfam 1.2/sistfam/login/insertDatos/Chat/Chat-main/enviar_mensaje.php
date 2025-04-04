<?php
session_start();
include 'bd.php';

// Obtener el ID del usuario autenticado
$id_usuario = $_SESSION['id_usuario'] ?? 0;
$mensaje = $_POST['mensaje'] ?? '';

// Verificar que el usuario esté autenticado y el mensaje no esté vacío
if ($id_usuario > 0 && !empty($mensaje)) {
    $mensaje = $conexion->real_escape_string($mensaje);
    // Guardar el mensaje en la base de datos
    $consulta = "INSERT INTO mensajes (id_usuario, mensaje) VALUES (?, ?)";
    $declaracion = $conexion->prepare($consulta);
    $declaracion->bind_param("is", $id_usuario, $mensaje);
    $declaracion->execute();
    $declaracion->close();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>