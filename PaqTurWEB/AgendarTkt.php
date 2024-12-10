<?php  
session_start();  
include "LoginPHP/ValidarLog.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>PANGEA Perú</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<script src="LoginPHP/CloseSessions.js"></script>

<?php 
include 'ConexionBD.php'; // Conexión a la base de datos

// Validar y obtener el ID y tipo
if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['tipo'])) {
    $id = intval($_GET['id']);
    $tipo = $_GET['tipo'];
} else {
    die("Error: Parámetros no válidos.");
}

$color = "";
$mensaje = "";

// Manejo de Tours
if ($tipo === "tour") {
    $sql = "SELECT * FROM tours WHERE id_tour = $id";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $tour = $resultado->fetch_assoc();
        $cupos_disponibles = intval($tour['cupos']);
    } else {
        die("Error: El tour seleccionado no existe.");
    }

    // Lógica de color para cupos
    if ($cupos_disponibles <= 4) {
        $color = "red";
        $mensaje = "¡Apresúrate! Quedan pocas reservas.";
    } elseif ($cupos_disponibles <= 10) {
        $color = "orange";
    } else {
        $color = "green";
    }
?>

    <div class="text-center mb-3 pb-3">
        <h2>Reserva tu Destino:</h2>
        <h3>"<?php echo $tour['nombre_tour']; ?>"</h3>
    </div>
    <div style="align-items: center; justify-content: center; display: flex;">
        <form method="POST" action="ProcesarRsv.php">
            <p>Duración: <?php echo $tour['duracion_horas']; ?> horas</p>
            <p>Precio de Ticket: $<?php echo $tour['precio']; ?></p>
            <p style="color: <?php echo $color; ?>; font-weight: bold;">Cupos disponibles: <?php echo $cupos_disponibles; ?></p>
            <?php if ($mensaje) { ?>
                <p style="color: red; font-size: 18px;"><em><?php echo $mensaje; ?></em></p>
            <?php } ?>
            <input type="hidden" name="id_tour" value="<?php echo $id; ?>">
            <label for="cantidad">Tickets a Reservar:</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control p-4" min="1" max="<?php echo min(5, $cupos_disponibles); ?>" required>
            <p style="color: red;">*(Máximo <?php echo min(5, $cupos_disponibles); ?> por persona)</p>
            <button type="submit" class="btn btn-primary btn-block py-3">Reservar</button>
            <small><em>*Sujeto a disponibilidad</em></small>
        </form>
    </div>

<?php
// Manejo de Paquetes Turísticos
} elseif ($tipo === "paquete") {
    $sql = "
        SELECT 
            p.nombre_paquete, p.precio_total, p.cupospqt,
            h.nombre AS nombre_hotel, t.nombre_tour,
            v.fecha_salida, v.fecha_regreso
        FROM 
            paquetes_turisticos AS p
        INNER JOIN 
            hoteles AS h ON p.id_hotel = h.id_hotel
        INNER JOIN 
            tours AS t ON p.id_tour = t.id_tour
        INNER JOIN 
            vuelos AS v ON p.id_vuelo = v.id_vuelo
        WHERE 
            p.id_paquete = $id";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $paquete = $resultado->fetch_assoc();
        $cupos_disponibles = intval($paquete['cupospqt']);
    } else {
        die("Error: El paquete seleccionado no existe.");
    }

    // Lógica de color para cupos
    if ($cupos_disponibles <= 4) {
        $color = "red";
        $mensaje = "¡Apresúrate! Quedan pocas reservas.";
    } elseif ($cupos_disponibles <= 10) {
        $color = "orange";
    } else {
        $color = "green";
    }
?>

    <div class="text-center mb-3 pb-3">
        <h1>Reserva tu Paquete:</h1>
        <h3>"<?php echo $paquete['nombre_paquete']; ?>"</h3>
    </div>
    <div style="align-items: center; justify-content: center; display: flex;">
        <form method="POST" action="ProcesarRsv.php">
            <p>Hotel: <?php echo $paquete['nombre_hotel']; ?></p>
            <p>Tour: <?php echo $paquete['nombre_tour']; ?></p>
            <p>Fecha de Salida: <?php echo $paquete['fecha_salida']; ?></p>
            <p>Fecha de Regreso: <?php echo $paquete['fecha_regreso']; ?></p>
            <p>Precio Total: S/.<?php echo $paquete['precio_total']; ?></p>
            <p style="color: <?php echo $color; ?>; font-weight: bold;">Cupos disponibles: <?php echo $cupos_disponibles; ?></p>
            <?php if ($mensaje) { ?>
                <p style="color: red; font-size: 18px;"><em><?php echo $mensaje; ?></em></p>
            <?php } ?>
            <input type="hidden" name="id_paquete" value="<?php echo $id; ?>">
            <label for="cantidad">Tickets a Reservar:</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control p-4" min="1" max="<?php echo min(5, $cupos_disponibles); ?>" required>
            <p style="color: red;">*(Máximo <?php echo min(5, $cupos_disponibles); ?> por persona)</p>
            <button type="submit" class="btn btn-primary btn-block py-3">Reservar</button>
            <small><em>*Sujeto a disponibilidad</em></small>
        </form>
    </div>

<?php
} else {
    die("Error: Tipo de reserva no válido.");
}
?>

</body>
</html>
