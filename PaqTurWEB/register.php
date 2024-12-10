<!DOCTYPE html>
<html lang="es">
<body>
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
<!-- Registration Start -->
    <div class="container-fluid bg-registration py-5" style="margin: 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Mega Oferta</h6>
                        <h1 class="text-white"><span class="text-primary">30% de descuento</span> Para usuarios nuevos</h1>
                    </div>
                    <p class="text-white">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                        ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet diam</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Etsea et sit dolor amet ipsum</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Diam dolor diam elitripsum vero.</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Regístrate</h1>
                        </div>

                        <!-- Registro -->
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form id="formReg" method="post" onsubmit="return validarFormulario()">
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="DNI" name="dni" id="dni" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="Nombre" name="nombre" id="nombre" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="Apellido" name="apellido" id="apellido" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control p-4" placeholder="E-mail" name="correo" id="correo" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control p-4" placeholder="Teléfono" name="telefono" id="telefono" required="required" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block py-3" name="Registrarse" type="submit">Registrarse</button>
                                </div>
                                <div id="error" style="color: red; display: none;"></div>
                            </form>
                            <br>
                            <p>¿Ya tienes cuenta? <a href="index.php">Inicia Sesión</a></p>
                            

                            <?php

  $inc= include ("ConexionBD.php"); 

 if(isset($_POST['Registrarse'])) {
    // Recibir los valores del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apell = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // 1. Comprobar si el DNI ya está registrado
    $queryDni = "SELECT * FROM clientes WHERE dni = '$dni'";
    $resultDni = mysqli_query($conexion, $queryDni);

    // 2. Comprobar si el email ya está registrado
    $queryEmail = "SELECT * FROM clientes WHERE email = '$correo'";
    $resultEmail = mysqli_query($conexion, $queryEmail);

    // 3. Verificar si el DNI o el email ya existen
    if (mysqli_num_rows($resultDni) > 0) {
        // Si el DNI ya existe
        echo '<div style="color: red; font-weight: bold; padding: 10px; background-color: #f8d7da; border: 1px solid red; border-radius: 5px;">El DNI ya está registrado. Por favor, ingrese un DNI diferente.</div>';
    } elseif (mysqli_num_rows($resultEmail) > 0) {
        // Si el email ya existe
        echo '<div style="color: red; font-weight: bold; padding: 10px; background-color: #f8d7da; border: 1px solid red; border-radius: 5px;">El correo electrónico ya está registrado. Por favor, ingrese un correo diferente.</div>';
    } else {
        // Si ninguno existe, insertar el nuevo registro
        $insertar = "INSERT INTO clientes Values ('', '$nombre', '$apell', '$correo','$telefono', '$dni')";
      
        $result0 = mysqli_query($conexion, $insertar);

        if ($result0) {
            echo '<div style="color: green; font-weight: bold; padding: 10px; background-color: #d4edda; border: 1px solid green; border-radius: 5px;">Registro exitoso. Inicie Sesión</div>';
        } else {
            echo '<div style="color: red; font-weight: bold; padding: 10px; background-color: #f8d7da; border: 1px solid red; border-radius: 5px;">Ocurrió un error al registrarse</div>';
        }
    }
}
?>

                        <!---->
<!--VALIDACIONES-->

<script>

  function validarFormulario() {
    // Obtener valores del formulario
    const nombre = document.getElementById('nombre').value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const correo = document.getElementById('correo').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const dni = document.getElementById('dni').value.trim();
    const errorDiv = document.getElementById('error');
    
    // Limpiar mensajes de error
    errorDiv.innerHTML = '';
    
    // Validación de DNI (solo números y 8 dígitos)
    const dniRegex = /^[0-9]{8}$/;
    if (!dniRegex.test(dni)) {
      errorDiv.innerHTML += 'El DNI debe tener exactamente 8 dígitos.<br>';
      errorDiv.style.display = 'block';
      return false;
    }

    // Validación de nombre y apellido (no puede estar vacío)
    if (nombre === '' || apellido === '') {
      errorDiv.innerHTML = 'El nombre y el apellido son requeridos.<br>';
      errorDiv.style.display = 'block';
      return false;
    }
    
    // Validación de correo (correo válido)
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(correo)) {
      errorDiv.innerHTML += 'Ingrese un correo electrónico válido.<br>';
      errorDiv.style.display = 'block';
      return false;
    }
    
    // Validación de teléfono (solo números y 9 dígitos)
    const telefonoRegex = /^[0-9]{9}$/;
    const telefonoRegex1 = /^9[0-9]{8}$/;
    if (!telefonoRegex.test(telefono)) {
      errorDiv.innerHTML += 'El teléfono debe tener exactamente 9 dígitos.<br>';
      errorDiv.style.display = 'block';
      return false;
    }
    if (!telefonoRegex1.test(telefono)) {
      errorDiv.innerHTML += 'Ingrese un número telefónico válido.<br>';
      errorDiv.style.display = 'block';
      return false;
    }
    
    
    
    // Si todas las validaciones pasan, enviar el formulario
    return true;
  }

 // Solo permitir números en el campo de teléfono y DNI, y limitar a 9 caracteres
  document.getElementById('telefono').addEventListener('input', function(e) {
    this.value = this.value.replace(/\D/g, ''); // Elimina cualquier carácter no numérico
    if (this.value.length > 9) {
      this.value = this.value.slice(0, 9); // Limita la longitud a 9 caracteres
    }
  });
  
  document.getElementById('dni').addEventListener('input', function(e) {
    this.value = this.value.replace(/\D/g, ''); // Elimina cualquier carácter no numérico
    if (this.value.length > 8) {
      this.value = this.value.slice(0, 8); // Limita la longitud a 8 caracteres
    }
  });  
</script>

<!---->


                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->

</body>
</html>