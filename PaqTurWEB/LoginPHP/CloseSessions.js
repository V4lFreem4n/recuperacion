
    // Enviar solicitud para cerrar sesión al cerrar la pestaña
    window.addEventListener("beforeunload", function () {
        navigator.sendBeacon("logout.php");
    }); 
