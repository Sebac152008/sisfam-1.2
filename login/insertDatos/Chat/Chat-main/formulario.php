<?php
// Iniciar la sesión para manejar la autenticación del usuario
session_start();

// Incluir el archivo de conexión a la base de datos
include __DIR__ . '/bd.php';

// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST['guardar'])) {
    // Obtener los datos del formulario
    $correo = $_POST['correo'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    // Validar que los campos no estén vacíos
    if (!empty($correo) && !empty($contraseña)) {
        // Preparar una consulta para buscar el usuario por su correo
        $consulta = "SELECT id, nombre, contraseña FROM usuarios WHERE correo = ?";
        $declaracion = $conexion->prepare($consulta);
        $declaracion->bind_param("s", $correo);
        $declaracion->execute();
        $resultado = $declaracion->get_result();

        // Verificar si se encontró un usuario con ese correo
        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($contraseña, $usuario['contraseña'])) {
                // Guardar el ID y el nombre del usuario en la sesión
                $_SESSION['id_usuario'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                // Redirigir al chat
                header('Location: chat.php');
                exit;
            } else {
                // Mostrar mensaje de error si la contraseña es incorrecta y redirigir a inicio.php
                echo "<script>alert('Contraseña incorrecta.'); window.location.href='chat.php';</script>";
            }
        } else {
            // Mostrar mensaje y redirigir a la página de registro si el correo no está registrado
            echo "<script>alert('El correo electrónico no está registrado. Serás redirigido a la página de registro.'); window.location.href='registro.php';</script>";
        }
        $declaracion->close();
    } else {
        // Mostrar mensaje de error si los campos están vacíos y redirigir a inicio.php
        echo "<script>alert('Por favor, completa todos los campos.'); window.location.href='inicio.php';</script>";
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>