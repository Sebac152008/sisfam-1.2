<?php
// Iniciar la sesión para verificar si el usuario está autenticado
//session_start();
// Si el usuario no está autenticado, redirigir a la página de inicio de sesión
if (!isset($_SESSION['id_usuario'])) {
    header('Location: inicio.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Institucional</title>
    <link rel="stylesheet" type="text/css" href="styles/menu_chat.css">
    <link rel="stylesheet" type="text/css" href="styles/chat.css">
    <link rel="stylesheet" href="fonts.css">
</head>
<body>
    <!-- Menú lateral -->
    <label>
        <input type="checkbox" class="menu_desplegable">
        <div class="toggle">
            <span class="top_line commom"></span>
            <span class="middle_line commom"></span>
            <span class="bottom_line commom"></span>
        </div>

        <div class="slide">
            <h1>MENÚ</h1>
            <ul>
                <li><a href="#"><i><img src="img/iconos/casa.png"></i>Inicio</a></li>
                <li><a href="#"><i><img src="img/iconos/chat-privado.png"></i>Mensajería</a>
                    <ul>
                        <li><a href="#"><i><img src="img/iconos/chats.png"></i>chats Existente</a></li>
                        <li><a href="#"><i><img src="img/iconos/chats.png"></i>Nuevo Chats</a></li>
                    </ul>
                </li>
                <li><a href="cerrar_sesion.php"><i><img src="img/iconos/sistema-de-seguridad.png"></i>Cerrar Sesión</a></li>
            </ul>
        </div>
    </label>

    <!-- Contenido principal -->
    <div class="content">
        <div class="header">
            <img src="img/ITFAM.png" class="logo">
            <p>Chat Institucional - Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></p>
        </div>
        <div class="chat-container" id="contenedorChat">
            <!-- Los mensajes se cargarán aquí dinámicamente -->
        </div>
        <div class="footer">
            <input type="text" placeholder="Escribe un mensaje..." id="entradaMensaje" onkeydown="verificarEnter(event)">
            <button onclick="enviarMensaje()">Enviar</button>
        </div>
    </div>

    <script src="javascript/script_chat.js"></script>
</body>
</html>