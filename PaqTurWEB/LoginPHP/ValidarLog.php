<?php
// Verificar si la sesión ya está iniciada antes de llamar a session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['correo'])) {  
    echo '  
    <script>  
        alert("Por favor debes iniciar sesión");
        window.location = "index.php";  
    </script>  
    '; 
    session_destroy();
    die();  
}
?>
