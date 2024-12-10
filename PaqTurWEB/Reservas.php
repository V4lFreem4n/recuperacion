<?php  

session_start(); 
include "LoginPHP/ValidarLog.php";

 

// Conexión a la base de datos
include "ConexionBD.php";

// Recuperar el correo y DNI de la sesión
$correo_usuario = $_SESSION['correo'];
$dni_usuario = $_SESSION['dni'];

// Consultar el nombre del usuario usando el correo y DNI
$stmt = $conexion->prepare("SELECT id_cliente, nombre FROM clientes WHERE email = ? AND dni = ?");
$stmt->bind_param("ss", $correo_usuario, $dni_usuario);  // Vincular los parámetros
$stmt->execute();
$result = $stmt->get_result();

// Validar si se encontró un resultado
if ($row = $result->fetch_assoc()) {
    $id_cliente = $row['id_cliente'];
    $nombre_usuario = $row['nombre'];
    // Convertir la primera letra del nombre a mayúscula
    $nombre_usuario = ucfirst(strtolower($nombre_usuario));
    $_SESSION['id_cliente'] = $id_cliente;
} else {
    // En caso de no encontrar al usuario, redirigir de nuevo al login
    echo '
    <script>
        alert("Usuario no encontrado, por favor verifica tus datos");
        window.location = "index.php";  // Redirigir al login
    </script>
    ';
    session_destroy();
    exit;
}

// Cerrar el prepared statement
$stmt->close();

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

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

    <?php $inc= include ("ConexionBD.php"); ?>
    
    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">        
        <a href="LoginPHP/logout.php?logout=true" name="logout" class="btn btn-primary">Cerrar Sesión</a>      
        <a class="ml-auto" href="MisRsv.php">Mis Reservas</a> 
    </nav>

    <div style="padding: 10px;">
        <h2><?php echo $nombre_usuario; ?>, BIENVENIDO A RESERVAS</h2>
    </div>
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Tours</h6>
                <h1>Explore Destinos Top</h1>
            </div>
            <p>Destinos Disponibles:</p>

            <?php  

$sql = "SELECT * FROM tours";
$resultado = $conexion->query($sql);
?>

 <div class="row">
    <?php
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            // Construir el nombre del archivo de imagen basado en el ID del tour
            $imagePath = "img/destination-{$row['id_tour']}.jpg";
            
            // Verificar si la imagen existe localmente
            if (!file_exists($imagePath)) {
                $imagePath = "img/defaultDest.jpg"; // Imagen por defecto
            }
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                
                <div class="destination-item position-relative overflow-hidden mb-2" 

                onclick="window.location.href='AgendarTkt.php?id=<?php echo $row['id_tour']; ?>&tipo=tour'">
                    <!-- Imagen del tour o predeterminada -->
                    <img class="img-fluid" src="<?php echo $imagePath; ?>" alt="<?php echo $row['nombre_tour']; ?>">
                    <a class="destination-overlay text-white text-decoration-none" href="#">
                        <h5 class="text-white"> <b> <?php echo $row['nombre_tour']; ?> </b> </h5>
                        <span><b>Duración:</b> <?php echo $row['duracion_horas']; ?> horas</span>
                        <p style=" text-align:center; padding: 5px; "><?php echo $row['descripcion']; ?></p>
                        <span><b>$<?php echo $row['precio']; ?></b></span>
                    </a>
                </div>
                
            </div>


            <?php
        }
    } else {
        echo "<p>No hay tours disponibles.</p>";
    }

    ?>
</div>


    

     <!-- Packages Start -->

<?php


// Consultar paquetes turísticos y sus relaciones
$sql = "
    SELECT 
        p.id_paquete, 
        p.nombre_paquete,
        p.precio_total,
        h.nombre AS nombre_hotel,
        v.fecha_salida,
        v.fecha_regreso,
        t.nombre_tour
    FROM 
        paquetes_turisticos AS p
    INNER JOIN 
        vuelos AS v ON p.id_vuelo = v.id_vuelo
    INNER JOIN 
        hoteles AS h ON p.id_hotel = h.id_hotel
    INNER JOIN 
        tours AS t ON p.id_tour = t.id_tour
";
$resultado = $conexion->query($sql);

// Validar si hay resultados
if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}
?>


    <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Paquetes de Tours</h6>
            <h1>Paquetes Turísticos Perfectos</h1>
        </div>
        <div class="row">
            <?php
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    // Construir el nombre del archivo de imagen basado en el ID del tour
            $imagePath2 = "img/package-{$row['id_paquete']}.jpg";
            
            // Verificar si la imagen existe localmente
            if (!file_exists($imagePath2)) {
                $imagePath2 = "img/defaultDest.jpg"; // Imagen por defecto
            }
                    ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <!-- Contenedor del paquete con redirección -->
                        <div class="package-item bg-white mb-2" 

                             
                             onclick="window.location.href='AgendarTkt.php?id=<?php echo $row['id_paquete']; ?>&tipo=paquete'">

                            <img class="img-fluid" src="<?php echo $imagePath2; ?>" alt="">
                            <div class="p-4" style="text-align: center;">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0" style="text-align: center; font-size: 12px;"><i class="fa fa-map-marker-alt text-primary mr-2"></i><?php echo $row['nombre_hotel']; ?></small>
                                    <small class="m-0" style="text-align: center; font-size: 12px;"><i class="fa fa-calendar-alt text-primary mr-2"></i><?php echo $row['fecha_salida']; ?></small>
                                    <small class="m-0" style="text-align: center; font-size: 12px;"><i class="fa fa-plane text-primary mr-2"></i><?php echo $row['fecha_regreso']; ?></small>
                                </div>
                                <a class="h5 text-decoration-none" href="#"><?php echo $row['nombre_paquete']; ?></a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0" style="text-align: center;"><i class="fa fa-star text-primary mr-2"></i><small><?php echo $row['nombre_tour']; ?></small></h6>
                                        <h5 class="m-0">S/.<?php echo $row['precio_total']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No hay paquetes disponibles.</p>";
            }
            ?>
        </div>
    </div>
</div>



               
    <!-- Packages End -->


    
</body>
</html>