<?php  
session_start();
include "LoginPHP/ValidarLog.php";
  
include 'ConexionBD.php';

if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];  // Accedes al id_cliente 
    // Continuar con el procesamiento de la reserva
} else {
    // Si no está logueado, redirigir al login
    echo '<script>alert("Por favor, inicie sesión."); window.location.href="index.php";</script>';
    exit;
}

date_default_timezone_set("America/Lima");
$ticket_generado = false;
$ticket_data = [];

// Validar los datos enviados por el formulario
if (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) {
    $cantidad_reservada = intval($_POST['cantidad']);
    $id_cliente = $_SESSION['id_cliente']; // Suponiendo que el usuario está logueado y se guarda en la sesión

    // Inicializar variables para el precio total
    $precio_total = 0;
    $id_tour = NULL;
    $id_paquete = NULL;

    // Verificar si se ha enviado un tour
    if (isset($_POST['id_tour'])) {
        $id_tour = intval($_POST['id_tour']);
        // Obtener datos del tour
        $sql_tour = "SELECT nombre_tour, precio, cupos FROM tours WHERE id_tour = $id_tour";
        $resultado_tour = $conexion->query($sql_tour);
        if ($resultado_tour->num_rows > 0) {
            $tour = $resultado_tour->fetch_assoc();
            $precio_total += $tour['precio'] * $cantidad_reservada;

            // Verificar disponibilidad de cupos
            $cupos_disponibles = $tour['cupos'];
            if ($cantidad_reservada > $cupos_disponibles) {
                echo '<script>alert("No hay suficientes cupos disponibles para este tour."); window.history.back();</script>';
                exit;
            }

            // Actualizar cupos
            $nuevos_cupos = $cupos_disponibles - $cantidad_reservada;
            $sql_actualizar = "UPDATE tours SET cupos = $nuevos_cupos WHERE id_tour = $id_tour";
            $conexion->query($sql_actualizar);
            $fecha_reserva = date("Y-m-d H:i:s");
            // Crear los datos del ticket para el tour
            $ticket_data = [
                'nombre_tour' => $tour['nombre_tour'],                
                'precio_total' => $tour['precio'],
                'cantidad_reservada' => $cantidad_reservada,
                'total' => $cantidad_reservada * $tour['precio'],
                'fecha_reserva' => $fecha_reserva
            ];
        } else {
            echo '<script>alert("El tour seleccionado no existe."); window.history.back();</script>';
            exit;
        }
    }

    // Verificar si se ha enviado un paquete turístico
    if (isset($_POST['id_paquete'])) {
        $id_paquete = intval($_POST['id_paquete']);
        $sql_paquete = "SELECT nombre_paquete, precio_total, cupospqt FROM paquetes_turisticos WHERE id_paquete = $id_paquete";
        $resultado_paquete = $conexion->query($sql_paquete);
        if ($resultado_paquete->num_rows > 0) {
            $paquete = $resultado_paquete->fetch_assoc();
            $precio_total += $paquete['precio_total'] * $cantidad_reservada;

            $cupos_disponibles = $paquete['cupospqt'];
            if ($cantidad_reservada > $cupos_disponibles) {
                echo '<script>alert("No hay suficientes cupos disponibles para este paquete turístico."); window.history.back();</script>';
                exit;
            }

            $nuevos_cupos = $cupos_disponibles - $cantidad_reservada;
            $sql_actualizar = "UPDATE paquetes_turisticos SET cupospqt = $nuevos_cupos WHERE id_paquete = $id_paquete";
            $conexion->query($sql_actualizar);

            $fecha_reserva = date("Y-m-d H:i:s");
            $ticket_data = [
                'nombre_paquete' => $paquete['nombre_paquete'],
                'precio_total' => $paquete['precio_total'],
                'cantidad_reservada' => $cantidad_reservada,
                'total' => $cantidad_reservada * $paquete['precio_total'],
                'fecha_reserva' => $fecha_reserva
            ];
        } else {
            echo '<script>alert("El paquete turístico seleccionado no existe."); window.history.back();</script>';
            exit;
        }
    }

    // Verificar que se haya seleccionado un tour o un paquete
    if ($id_tour === NULL && $id_paquete === NULL) {
        echo '<script>alert("Debes seleccionar un tour o un paquete turístico."); window.history.back();</script>';
        exit;
    }

    // Si se llegó hasta aquí, se realiza la reserva
    if ($precio_total > 0) {
        // Obtener la fecha y generar la consulta de inserción
        $fecha_reserva = date("Y-m-d H:i:s");
        if ($id_tour !== NULL) {
    $sql_reserva = "INSERT INTO reservas (id_reserva, id_cliente, id_vuelo, id_hotel, id_tour, id_paquete, cupos_rsv, fecha_reserva, precio_total) 
                    VALUES ('', $id_cliente, NULL, NULL, $id_tour, NULL, $cantidad_reservada, '$fecha_reserva', $precio_total)";
} else if ($id_paquete !== NULL) {
    $sql_reserva = "INSERT INTO reservas (id_reserva, id_cliente, id_vuelo, id_hotel, id_tour, id_paquete, cupos_rsv, fecha_reserva, precio_total) 
                    VALUES ('', $id_cliente, NULL, NULL, NULL, $id_paquete, $cantidad_reservada, '$fecha_reserva', $precio_total)";
}

        if ($conexion->query($sql_reserva) === TRUE) {
            $ticket_generado = true;
        } else {
            echo '<script>alert("Error al insertar la reserva. Inténtalo nuevamente."); window.history.back();</script>';
        }
    } else {
        echo '<script>alert("No se ha seleccionado ningún servicio para la reserva."); window.history.back();</script>';
    }
} else {
    echo '<script>alert("Error en los datos enviados."); window.history.back();</script>';
}

$conexion->close();
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>PANGEA Perú</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<script src="LoginPHP/CloseSessions.js"></script>

<div style="padding: 20px; text-align: center;">
    <?php if ($ticket_generado) { ?>
        <h2>¡Reserva realizada con éxito!</h2>
        <div style="border: 1px solid #ddd; padding: 15px; margin: 20px auto; width: 50%; text-align: left;">
            <h3>Detalles del Ticket</h3>
            <?php if (isset($ticket_data['nombre_tour'])) { ?>
                <!-- Ticket para Tour -->
                <p><strong>Nombre del Tour:</strong> <?php echo $ticket_data['nombre_tour']; ?></p>
            <?php } elseif (isset($ticket_data['nombre_paquete'])) { ?>
                <!-- Ticket para Paquete Turístico -->
                <p><strong>Nombre del Paquete Turístico:</strong> <?php echo $ticket_data['nombre_paquete']; ?></p>
            <?php } ?>
            <p><strong>Precio por Ticket:</strong> $<?php echo $ticket_data['precio_total']; ?></p>
            <p><strong>Cantidad Reservada:</strong> <?php echo $ticket_data['cantidad_reservada']; ?></p>
            <p><strong>Total Pagado:</strong> $<?php echo $ticket_data['total']; ?></p>
            <p><strong>Fecha de Reserva:</strong> <?php echo $ticket_data['fecha_reserva']; ?></p>
        </div>
    <?php } else { ?>
        <h2>Error al procesar la reserva</h2>
    <?php } ?>
    <a href="Reservas.php" class="btn btn-primary">Volver a Reservas</a>
</div>

    
</body>
</html>