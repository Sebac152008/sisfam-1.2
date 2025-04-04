document.addEventListener('DOMContentLoaded', function() {
    const botonRegistro = document.getElementById('botonRegistro');
    const botonIngresar = document.getElementById('botonIngresar');
    const ladoIzquierdo = document.querySelector('.lado-izquierdo');
    const ladoDerecho = document.querySelector('.lado-derecho');

    // Evento para "Registrarse"
    botonRegistro.addEventListener('click', function(event) {
        event.preventDefault();

        // Aplicamos las clases de animación
        ladoIzquierdo.classList.add('mover-lado-izquierdo');
        ladoDerecho.classList.add('mover-lado-derecho');

        // Redirigimos después de la animación
        setTimeout(function() {
            window.location.href = 'registro.html';
        }, 2000); // Duración de la animación (2 segundos)
    });

    // Evento para "Iniciar sesión"
    botonIngresar.addEventListener('click', function(event) {
        event.preventDefault();

        // Quitamos las clases de animación
        ladoIzquierdo.classList.remove('mover-lado-izquierdo');
        ladoDerecho.classList.remove('mover-lado-derecho');

        // Simula inicio de sesión o redirige (según sea necesario)
        setTimeout(function() {
            window.location.href = 'inicio.html';
        }, 2000); // Duración de la animación (2 segundos)
    });
});
