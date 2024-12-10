<?php  

session_start(); 
include "LoginPHP/ValidarLog.php";

 // Conexión a la base de datos
include "ConexionBD.php";

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

<script>

    document.addEventListener("DOMContentLoaded", () => {
    // Realizar la petición a la API
    fetch("http://localhost/ApiREST/ARobtRsv.php")
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.status === "success") {
                mostrarReservas(data);
            } else {
                console.error("Error de la API:", data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
});

function mostrarReservas(data) {
    const toursContainer = document.getElementById("reservas-tours");
    const paquetesContainer = document.getElementById("reservas-paquetes");

    // Limpiar contenedores
    toursContainer.innerHTML = "";
    paquetesContainer.innerHTML = "";

    // Mostrar tours
    data.tours.forEach(reserva => {
        const card = crearReservaCard(reserva, "tour");
        toursContainer.appendChild(card);
    });

    // Mostrar paquetes
    data.paquetes.forEach(reserva => {
        const card = crearReservaCard(reserva, "paquete");
        paquetesContainer.appendChild(card);
    });
}

// Función para crear una tarjeta de reserva (tour o paquete)
function crearReservaCard(reserva, tipo) {
    const card = document.createElement("div");
    card.classList.add("fila-reserva"); // Asignar la clase de estilo para la tarjeta

    // Modificar el contenido de la tarjeta según la reserva
    card.innerHTML = `
        <div><strong>${reserva.nombre}</strong></div> <!-- Nombre del tour o paquete -->
        <div>Fecha de reserva: ${reserva.fecha_reserva}</div> <!-- Fecha de la reserva -->
        <div>Precio: S/.${reserva.precio_total}</div> <!-- Precio de la reserva -->
    `;

    // Evento clic para redirigir al detalle de la reserva
    card.addEventListener("click", () => {
        window.location.href = `detalleRsv.php?id=${reserva.id_reserva}&tipo=${tipo}`;
    });

    return card;
}

    
</script>
    
</head>
<body>

<script src="LoginPHP/CloseSessions.js"></script>


<div style="padding: 10px; background-color: skyblue; display: flex; justify-content: space-between; align-items: center;">
    <h1>Reservas realizadas:</h1>
    <a href="Reservas.php" class="btn-volver">Volver a Reservas</a>
</div>

<section style="padding: 10px;">
    <h2>Tours</h2>
    <div id="reservas-tours" style="padding: 20px;" class="row"></div>
</section>

<section style="padding: 10px;">
    <h2>Paquetes Turísticos</h2>
    <div id="reservas-paquetes" style="padding: 20px;" class="row"></div>
</section>

<style type="text/css">

    .btn-volver {
        text-decoration: none;
        color: white;
        background-color: darkblue;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease, transform 0.2s ease; /* Transición suave */
    }

    .btn-volver:hover {
        text-decoration: none;
        color: white;
        background-color: royalblue; /* Cambia el color al pasar el mouse */
        transform: scale(1.05); /* Aumenta ligeramente el tamaño */
    }

    .fila-reserva {
        border: 2px solid skyblue;
        border-radius: 8px;
    background-color: #fce3a5; /* Color de fondo */
    padding: 15px;
    border-radius: 8px; /* Bordes redondeados */
    width: 300px; /* Ancho de cada tarjeta */
    cursor: pointer; /* Cambia el cursor a un puntero */
    transition: background-color 0.3s; /* Animación suave para el cambio de color */
}

.fila-reserva:hover {
    background-color: #f8d170; /* Color al pasar el mouse */
}

/* Ajustes de diseño dentro de cada tarjeta */
.fila-reserva div {
    margin-bottom: 10px;
    font-size: 14px;
    color: #333;
}
</style>

</body>
</html>