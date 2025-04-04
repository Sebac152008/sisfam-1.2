
<?php include '../../../navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<div class="contenedor"> 
    <form action="" method="POST" id="myForm"> 
        <h2>Formulario de noticias</h2> 
        <div class="form-container"> 
            <div class="form-input"> 
                <label for="miniatura">Previsualización</label> 
                <input required type="file" name="miniatura" id="miniatura" accept="image/*"> 
                <div id="miniatura-preview-container" class="image-preview-container"> 
                    <img id="miniatura-preview" src="" alt="Vista previa de la miniatura"> 
                </div> 
                <p id="miniatura-error-message" class="error-message">Por favor, selecciona un archivo de imagen válido para la Previsualización.</p> 
            </div> 
            <div class="form-input"> 
                <label for="titulo">Título</label> 
                <input required type="text" name="titulo" id="titulo"> 
            </div> 
            <div class="form-input"> 
                <label for="imagen">Cargar archivos (Opcional)</label> 
                <input type="file" name="imagen" id="imagen" accept="image/*,video/*,audio/*"> 
                <div id="imagen-preview-container" class="image-preview-container"> 
                    <img id="imagen-preview" src="" alt="Vista previa del contenido"> 
                </div> 
                <p id="imagen-error-message" class="error-message">Por favor, selecciona un archivo de imagen, video o audio válido.</p> 
            </div> 
            <div class="form-input"> 
                <label for="contenido">Contenido</label> 
                <textarea name="contenido" id="contenido" required maxlength="500"></textarea> 
            </div> 
            <div class="form-input"> 
                <label for="">¿A quién va dirigido?</label> 
                <select name="" id=""> 
                    <option value="">Todos</option> 
                    <option value="">Estudiantes</option> 
                    <option value="">Padres</option> 
                    <option value="">Maestros</option> 
                </select> 
            </div> 
            <div class="form-input"> 
                <input type="submit" value="Publicar"> 
            </div> 
        </div> 
    </form> 
   </div>     
    <script src="script.js"></script>
</body> 
</html>
