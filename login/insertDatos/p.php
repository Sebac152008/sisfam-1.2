<?php
if (isset($_POST['send'])) {
    $selectedCard = htmlspecialchars($_POST['selectAll']);
    $option1 = htmlspecialchars($_POST['option1']); 
    $label = htmlspecialchars($_POST['labelText']);
    $image = $_FILES['image']; 
    $additionalText = htmlspecialchars($_POST['additionalText']);

    // Validar la tarjeta seleccionada
    if ($selectedCard == $option1) {
        // Manejo de subida de imagen
        $uploadDirectory = "img/";
        $imagePath = $uploadDirectory . basename($image['name']);

        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Generar el HTML dinámico para actualizar la tarjeta
            echo "
            <div class='tarjeta'>
                <img src='$imagePath' alt='Imagen Actualizada'>
                <h3>$label</h3>
                <p>$additionalText</p>
            </div>
            ";
        } else {
            echo "Error al subir la imagen. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "La tarjeta seleccionada no coincide.";
    }
} else {
    echo "Formulario no enviado correctamente.";
}
?>