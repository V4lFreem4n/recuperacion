<?php
session_start();
// Validar sesión
include "LoginPHP/ValidarLog.php";

include "ConexionBD.php";

// Obtener parámetros de la URL
$id_reserva = isset($_GET['id']) ? intval($_GET['id']) : null;
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null;

if (!$id_reserva || !$tipo) {
    die("Error: Falta información de la reserva.");
}

// Consultar detalles de la reserva
if ($tipo === "tour") {
    $sql = "SELECT r.id_reserva, t.nombre_tour AS nombre, t.precio AS precio_unitario, r.cupos_rsv, r.fecha_reserva, (t.precio * r.cupos_rsv) AS total
            FROM reservas r
            JOIN tours t ON r.id_tour = t.id_tour
            WHERE r.id_reserva = ?";
} elseif ($tipo === "paquete") {
    $sql = "SELECT r.id_reserva, p.nombre_paquete AS nombre, p.precio_total AS precio_unitario, r.cupos_rsv, r.fecha_reserva, (p.precio_total * r.cupos_rsv) AS total
            FROM reservas r
            JOIN paquetes_turisticos p ON r.id_paquete = p.id_paquete
            WHERE r.id_reserva = ?";
} else {
    die("Error: Tipo de reserva inválido.");
}

// Preparar y ejecutar consulta
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_reserva);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    die("No se encontraron detalles para la reserva.");
}

$reserva = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de la Reserva</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="LoginPHP/CloseSessions.js"></script> <!-- Script de cierre de sesiones -->
    <style>
        .detalle-reserva {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 50px auto;
            width: 50%;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .detalle-reserva h2 {
            text-align: center;
        }
        .detalle-reserva p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="detalle-reserva">
        <h2>Detalles de la Reserva</h2>
        <p><strong>Nombre:</strong> <?php echo $reserva['nombre']; ?></p>
        <p><strong>Precio Unitario:</strong> S/. <?php echo number_format($reserva['precio_unitario'], 2); ?></p>
        <p><strong>Cantidad:</strong> <?php echo $reserva['cupos_rsv']; ?></p>
        <p><strong>Total Pagado:</strong> S/. <?php echo number_format($reserva['total'], 2); ?></p>
        <p><strong>Fecha de Reserva:</strong> <?php echo $reserva['fecha_reserva']; ?></p>
    </div>
    <div style="text-align: center;">
        <a href="MisRsv.php" class="btn btn-primary">Volver a Mis Reservas</a>
    </div>
</body>
</html>
