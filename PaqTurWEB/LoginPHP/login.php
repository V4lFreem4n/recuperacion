<?php
 session_start();

 $inc= include ("../ConexionBD.php"); 

 if (isset($_POST['login'])) {
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $dni = mysqli_real_escape_string($conexion, $_POST['dni']);

    $validar_login = mysqli_query($conexion, "SELECT * FROM clientes WHERE email='$correo' AND dni='$dni'");

    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['correo'] = $correo;
        $_SESSION['dni'] = $dni;
        header("Location: ../Reservas.php");
        exit;
    } else {
        $_SESSION['error_login'] = 'El usuario no existe. Intente de nuevo.';
        header("Location: ../index.php#LoginSt");  // Redirigir de vuelta a index.php
        exit;

    }
}
 ?>