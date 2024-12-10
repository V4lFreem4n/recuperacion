 <?php

session_start();

// Eliminar todas las variables de sesión
session_unset(); 
session_destroy();

// Si se accede con el parámetro "logout" (clic en el botón), redirigir a la página principal
if (isset($_GET['logout'])) {
    header("location: ../index.php"); // Cambia "../index.php" según tu estructura
    exit;
}
       
?>