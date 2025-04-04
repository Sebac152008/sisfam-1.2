document.addEventListener('DOMContentLoaded', function() {
    const botonRegistro = document.getElementById('botonRegistro');
    const botonIngresar = document.getElementById('botonIngresar');
    const ladoIzquierdo = document.querySelector('.lado-izquierdo');
    const ladoDerecho = document.querySelector('.lado-derecho');

    // Botón "Iniciar sesión" con animación y redirección
    botonIngresar.addEventListener('click', function(event) {
        event.preventDefault();
        
        // Aplicamos las clases de animación
        ladoIzquierdo.classList.add('mover-lado-izquierdo');
        ladoDerecho.classList.add('mover-lado-derecho');

        // Redirigimos tras la animación
        setTimeout(function() {
            window.location.href = 'inicio.html';
        }, 2000);
    });

    // Botón "Registrarse" con animación y redirección
    botonRegistro.addEventListener('click', function(event) {
        event.preventDefault();
        
        // Aplicamos las mismas clases de animación
        ladoIzquierdo.classList.add('mover-lado-izquierdo');
        ladoDerecho.classList.add('mover-lado-derecho');

        // Mostramos un mensaje y redirigimos tras la animación
        setTimeout(function() {
            alert("Hablanco con la base de datos...");;
        }, 2000);
    });
});
