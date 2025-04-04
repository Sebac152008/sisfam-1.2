<?php
// Función para establecer la conexión a la base de datos
function conectarBaseDatos() {
    // Configuración de la conexión
    $servidor = "localhost"; // Cambia si no usas localhost
    $usuario = "root";
    $contrasena = "CP202110";
    $baseDatos = "formbd";

    // Crear la conexión
    $conexion = new mysqli($servidor, $usuario, $contrasena, $baseDatos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Retornar la conexión exitosa
    return $conexion;
}

// Ejemplo de uso de la función
$conexion = conectarBaseDatos();
echo "Conexión exitosa";

// Cierra la conexión cuando termines (opcional)
$conexion->close();
?>
