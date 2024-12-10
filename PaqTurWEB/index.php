<?php

session_start();
if(isset($_SESSION['correo'])){

    header("location: Reservas.php");//llevar a la pag de bienvenida

}

// Verificar si hay un mensaje de error almacenado en la sesión
if (isset($_SESSION['error_login'])) {
    $error_message = $_SESSION['error_login'];
    unset($_SESSION['error_login']);  // Limpiar el mensaje de error después de mostrarlo
}
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
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>reservas@pangea.com.pe</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>(01) 7664306</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-primary">PAN<span class="text-dark">GEA</span></h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Inicio</a>
                        <a href="about.html" class="nav-item nav-link">Nosotros</a>
                        <a href="service.html" class="nav-item nav-link">Servicios</a>
                        <a href="package.html" class="nav-item nav-link">Tours</a>
                        
                        <a href="contact.html" class="nav-item nav-link">Contacto</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel...</h4>
                            <h1 class="display-3 text-white mb-md-4">Descubre mundos nuevos</h1>
                            <a href="#LoginSt" class="btn btn-primary py-md-3 px-md-5 mt-2">¡Viaja Ahora!</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel...</h4>
                            <h1 class="display-3 text-white mb-md-4">El mundo en tus manos</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">¡Viaja Ahora!</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Booking Start -->
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Destination</option>
                                        <option value="1">Destination 1</option>
                                        <option value="2">Destination 1</option>
                                        <option value="3">Destination 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Depart Date" data-target="#date1" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Return Date" data-target="#date2" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Duration</option>
                                        <option value="1">Duration 1</option>
                                        <option value="2">Duration 1</option>
                                        <option value="3">Duration 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">SOBRE NOSOTROS</h6>
                        <h1 class="mb-3">Los Mejores Paquetes Turísticos Al Alcance De Tus Manos</h1>
                        <p>Explora los destinos más impresionantes con nuestras ofertas exclusivas. Diseñamos paquetes turísticos que combinan comodidad, aventura y precios accesibles para que vivas experiencias inolvidables. ¡El viaje de tus sueños está a solo un clic de distancia!</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/about-1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/about-2.jpg" alt="">
                            </div>
                        </div>
                        <a href="#LoginSt" class="btn btn-primary mt-1">Agenda Ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5">
    <div class="container pb-5">
        <div class="row">
            <!-- Precios Competitivos -->
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-money-check-alt text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Precios Competitivos</h5>
                        <p class="m-0">Ofrecemos las mejores tarifas del mercado para que viajes sin preocupaciones y aproveches al máximo tu presupuesto.</p>
                    </div>
                </div>
            </div>

            <!-- El Mejor Servicio -->
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-award text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">El Mejor Servicio</h5>
                        <p class="m-0">Nuestro equipo está comprometido a brindarte atención personalizada y una experiencia de viaje única e inolvidable.</p>
                    </div>
                </div>
            </div>

            <!-- Cobertura Mundial -->
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-globe text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Cobertura Mundial</h5>
                        <p class="m-0">Conéctate con los destinos más increíbles alrededor del mundo. Hacemos que llegar a cualquier lugar sea más fácil.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Feature End -->


    


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
                <h1>Servicios de Tours & Travel</h1>
            </div>
            <div class="row">
    <!-- Guía de Viaje -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-item bg-white text-center mb-2 py-5 px-4">
            <i class="fa fa-2x fa-route mx-auto mb-4"></i>
            <h5 class="mb-2">Guía de Viaje</h5>
            <p class="m-0">Conoce cada rincón de tus destinos favoritos con la ayuda de expertos locales. Déjate guiar por rutas exclusivas llenas de historia y cultura.</p>
        </div>
    </div>
    <!-- Agenda Tickets -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-item bg-white text-center mb-2 py-5 px-4">
            <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
            <h5 class="mb-2">Agenda Tickets</h5>
            <p class="m-0">Asegura tus boletos de viaje sin complicaciones. Nuestro sistema ágil y fácil de usar te permite organizar tus planes en minutos.</p>
        </div>
    </div>
    <!-- Reserva Vuelo y Hotel -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-item bg-white text-center mb-2 py-5 px-4">
            <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
            <h5 class="mb-2">Reserva Vuelo y Hotel</h5>
            <p class="m-0">Disfruta de la comodidad de gestionar tus vuelos y alojamiento en un solo lugar. Más tiempo para disfrutar, menos para preocuparte.</p>
        </div>
    </div>
</div>

        </div>
    </div>
    <!-- Service End -->


   

    <!-- Login Start -->
    <div class="container-fluid bg-registration py-5" id="LoginSt" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="mb-4">
    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Mega Oferta</h6>
    <h1 class="text-white"><span class="text-primary">30% OFF</span> Para Parejas</h1>
</div>
<p class="text-white">
    ¡Disfruta de momentos inolvidables con tu pareja! Aprovecha un 30% de descuento en nuestros paquetes exclusivos para dos. Viaja, explora y crea recuerdos únicos con ofertas diseñadas especialmente para ti.
</p>
<ul class="list-inline text-white m-0">
    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Descuentos en destinos románticos</li>
    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Servicios exclusivos para parejas</li>
    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Atención personalizada para tu viaje</li>
</ul>

                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Inicia Sesión</h1>
                        </div>

                        <!-- Inicio de sesion -->
                        <div class="card-body rounded-bottom bg-white p-5">

                            <form id="formLg" method="post" onsubmit="return validarFormulario()" action="LoginPHP/login.php">
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="DNI" name="dni" id="dni" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control p-4" placeholder="E-mail" name="correo" id="correo" required="required" />
                                </div>
                                <!-- SELECCION 
                                <div class="form-group">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Select a destination</option>
                                        <option value="1">destination 1</option>
                                        <option value="2">destination 2</option>
                                        <option value="3">destination 3</option>
                                    </select>
                                </div>
                                -->
                                <div>
                                    <button class="btn btn-primary btn-block py-3" name="login" type="submit">Iniciar Sesión</button>
                                </div>
                            </form>
                            <br>
                            <p>¿No tienes cuenta?</p>
                            <a href="register.php">Regístrate Ahora</a>
                             <!-- Mostrar el mensaje de error si existe -->
        <?php 
        if (isset($error_message)) {
        ?>
        <div style="color: red; margin-top: 10px; font-weight: bold; padding: 10px; background-color: #f8d7da; border: 1px solid red; border-radius: 5px;">
                <?php echo $error_message; ?></div>
                <?php } ?>
                        <!---->

                        <script>

  function validarFormulario() {
    // Obtener valores del formulario
    const correo = document.getElementById('correo').value.trim();
    const dni = document.getElementById('dni').value.trim();
    
    
    // Limpiar mensajes de error
    errorDiv.innerHTML = '';
    
        
    // Validación de correo (correo válido)
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(correo)) {
      errorDiv.innerHTML += 'Ingrese un correo electrónico válido.<br>';
      errorDiv.style.display = 'block';
      return false;
    }
    
    // Validación de DNI (solo números y 8 dígitos)
    const dniRegex = /^[0-9]{8}$/;
    if (!dniRegex.test(dni)) {
      errorDiv.innerHTML += 'El DNI debe tener exactamente 8 dígitos.<br>';
      errorDiv.style.display = 'block';
      return false;
    }
    
    // Si todas las validaciones pasan, enviar el formulario
    return true;
  }

  document.getElementById('dni').addEventListener('input', function(e) {
    this.value = this.value.replace(/\D/g, ''); // Elimina cualquier carácter no numérico
    if (this.value.length > 8) {
      this.value = this.value.slice(0, 8); // Limita la longitud a 8 caracteres
    }
  });  
</script>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Guides</h6>
                <h1>Nuestros Guías Turísticos</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
    <h5 class="text-truncate">Sofía Ramírez</h5>
    <p class="m-0">Especialista en Turismo Histórico</p>
</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
    <h5 class="text-truncate">Carlos Gutiérrez</h5>
    <p class="m-0">Experto en Aventura y Naturaleza</p>
</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
    <h5 class="text-truncate">Luciana Morales</h5>
    <p class="m-0">Guía de Cultura y Gastronomía</p>
</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
    <h5 class="text-truncate">Javier Fernández</h5>
    <p class="m-0">Coordinador de Excursiones Personalizadas</p>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


   <!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonios</h6>
            <h1>Qué Dicen Nuestros Clientes</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="text-center pb-4">
                <img class="img-fluid mx-auto" src="img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text bg-white p-4 mt-n5">
                    <p class="mt-5">"Gracias a PANGEA, pude descubrir los destinos más impresionantes del país. Su atención al cliente es excepcional."</p>
                    <h5 class="text-truncate">Carlos Gómez</h5>
                    <span>Fotógrafo</span>
                </div>
            </div>
            <div class="text-center">
                <img class="img-fluid mx-auto" src="img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text bg-white p-4 mt-n5">
                    <p class="mt-5">"Organizaron un viaje inolvidable para mi familia. Todo estuvo perfectamente planeado y sin preocupaciones."</p>
                    <h5 class="text-truncate">María Pérez</h5>
                    <span>Empresaria</span>
                </div>
            </div>
            <div class="text-center">
                <img class="img-fluid mx-auto" src="img/testimonial-3.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text bg-white p-4 mt-n5">
                    <p class="mt-5">"La experiencia con PANGEA fue simplemente maravillosa. No dudaré en volver a contratar sus servicios."</p>
                    <h5 class="text-truncate">Juan Rodríguez</h5>
                    <span>Diseñador</span>
                </div>
            </div>
            <div class="text-center">
                <img class="img-fluid mx-auto" src="img/testimonial-4.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text bg-white p-4 mt-n5">
                    <p class="mt-5">"Recomiendo PANGEA a cualquiera que busque una experiencia de viaje única y profesional."</p>
                    <h5 class="text-truncate">Luis Martínez</h5>
                    <span>Abogado</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->



    <!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Nuestro Blog</h6>
            <h1>Lo Último De Nuestro Blog</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog-item">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                        <div class="blog-date">
                            <h6 class="font-weight-bold mb-n1">15</h6>
                            <small class="text-white text-uppercase">Dic</small>
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <div class="d-flex mb-2">
                            <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-primary text-uppercase text-decoration-none" href="">Destinos</a>
                        </div>
                        <a class="h5 m-0 text-decoration-none" href="">Descubre las playas más hermosas para visitar este verano</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog-item">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/blog-2.jpg" alt="">
                        <div class="blog-date">
                            <h6 class="font-weight-bold mb-n1">10</h6>
                            <small class="text-white text-uppercase">Dic</small>
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <div class="d-flex mb-2">
                            <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-primary text-uppercase text-decoration-none" href="">Consejos</a>
                        </div>
                        <a class="h5 m-0 text-decoration-none" href="">10 consejos esenciales para planificar tu próximo viaje</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog-item">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/blog-3.jpg" alt="">
                        <div class="blog-date">
                            <h6 class="font-weight-bold mb-n1">05</h6>
                            <small class="text-white text-uppercase">Dic</small>
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <div class="d-flex mb-2">
                            <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-primary text-uppercase text-decoration-none" href="">Aventura</a>
                        </div>
                        <a class="h5 m-0 text-decoration-none" href="">Rutas de montaña: los destinos imperdibles para aventureros</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary">P<span class="text-white">ANGEA</span></h1>
                </a>
                <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed vero lorem dolor dolor</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Servicios</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Destinos</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Servicios</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Packages Tours</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guia Turística</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimoniós</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Services</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Packages</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contáctanos</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Noticias y Ofertas</h6>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-3">Envíar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Designed by <a href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>