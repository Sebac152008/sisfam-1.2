// Vista previa para miniatura
document.getElementById('miniatura').addEventListener('change', function(event) { 
    const fileInput = event.target; 
    const file = fileInput.files[0]; // Obtener el archivo seleccionado 

    const errorMessage = document.getElementById('miniatura-error-message'); 
    const imagePreview = document.getElementById('miniatura-preview'); 
    const imagePreviewContainer = document.getElementById('miniatura-preview-container'); 

    // Si no hay archivo seleccionado, no hacemos nada
    if (!file) { 
        return; 
    }

    // Verificamos si el archivo es una imagen
    const fileType = file.type.split('/')[0]; // Obtenemos el tipo MIME, y verificamos si es "image" 
     
    if (fileType !== 'image') { 
        errorMessage.style.display = 'block'; // Mostrar el mensaje de error 
        fileInput.value = ''; // Limpiar el campo de archivo 
        imagePreview.style.display = 'none'; // Ocultar la imagen previa 
        imagePreviewContainer.style.display = 'none'; // Ocultar el contenedor de vista previa 
    } else { 
        errorMessage.style.display = 'none'; // Ocultar el mensaje de error 

        // Mostrar la imagen previa
        const reader = new FileReader(); 
        reader.onload = function(e) { 
            imagePreview.src = e.target.result; // Asignar la imagen leída a la vista previa 
            imagePreview.style.display = 'block'; // Mostrar la imagen 
            imagePreviewContainer.style.display = 'block'; // Asegurarse de que el contenedor sea visible 
        }; 
        reader.readAsDataURL(file); 
    } 
});

// Vista previa para archivo de contenido (imagen, video, audio)
document.getElementById('imagen').addEventListener('change', function(event) { 
    const fileInput = event.target; 
    const file = fileInput.files[0]; // Obtener el archivo seleccionado 

    const errorMessage = document.getElementById('imagen-error-message'); 
    const imagePreviewContainer = document.getElementById('imagen-preview-container'); 

    // Si no hay archivo seleccionado, no hacemos nada
    if (!file) { 
        return; 
    }

    // Verificamos si el archivo es una imagen, video o audio
    const fileType = file.type.split('/')[0]; // Obtenemos el tipo MIME, y verificamos si es "image", "video" o "audio" 

    if (fileType !== 'image' && fileType !== 'video' && fileType !== 'audio') { 
        errorMessage.style.display = 'block'; // Mostrar el mensaje de error 
        fileInput.value = ''; // Limpiar el campo de archivo 
        imagePreviewContainer.style.display = 'none'; // Ocultar el contenedor de vista previa 
    } else { 
        errorMessage.style.display = 'none'; // Ocultar el mensaje de error 
        const reader = new FileReader(); 
        reader.onload = function(e) { 
            if (fileType === 'image') { 
                const imagePreview = document.getElementById('imagen-preview'); 
                imagePreview.src = e.target.result; // Asignar la imagen leída a la vista previa 
                imagePreview.style.display = 'block'; // Mostrar la imagen 
                imagePreviewContainer.style.display = 'block'; // Asegurarse de que el contenedor sea visible 
            } else if (fileType === 'video') { 
                imagePreviewContainer.innerHTML = `<video controls width="100%"> 
                                                        <source src="${e.target.result}" type="${file.type}"> 
                                                        Tu navegador no soporta este tipo de video. 
                                                    </video>`; 
                imagePreviewContainer.style.display = 'block'; // Asegurarse de que el contenedor sea visible 
            } else if (fileType === 'audio') { 
                imagePreviewContainer.innerHTML = `<audio controls> 
                                                        <source src="${e.target.result}" type="${file.type}"> 
                                                        Tu navegador no soporta este tipo de audio. 
                                                    </audio>`; 
                imagePreviewContainer.style.display = 'block'; // Asegurarse de que el contenedor sea visible 
            } 
        }; 
        reader.readAsDataURL(file); 
    } 
});
