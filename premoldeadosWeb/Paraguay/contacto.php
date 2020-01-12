<!doctype html>
<html lang="es">

<head>
    <?php include('includes/meta.php'); ?>
    <link rel="stylesheet" href="static/css/sweetalert2.css"/>   
    <?php include('includes/link.php'); ?>

    <title>Premoldeados del Paraguay</title>
</head>

<body>
	<?php include('includes/nav-bar.php'); ?>
    
    <section class="paginas-productos">
        <div class="container">
            <h1>Contacto</h1>
    
            <hr class="hr-main">
    
            <div class="row row-contacto">    
                <div class="col-sm-12 col-md-6">                    
                    <h4>Contacto</h4>

                    <form action="contact.php" method="POST">
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" class="form-control" name="nombre">
                                    <small class="form-text text-muted">Nombre</small>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" class="form-control" name="apellidos">
                                    <small class="form-text text-muted">Apellidos</small>
                                </div>
                            </div>                            
                        </div>

                        <div class="form-group">
                            <label for="">Cargo: <span class="form-asterisco">*</span></label>
                            <input type="text" class="form-control" name="cargo" required >
                        </div>

                        <div class="form-group">
                            <label for="">Empresa / Municipalidad / Ente: <span class="form-asterisco">*</span></label>
                            <select class="form-control" name="tipo" required>
                                <option selected>Seleccionar</option>
                                <option>Constructora</option>
                                <option>Municipalidad</option>
                                <option>Ente provincial</option>
                                <option>Ente nacional</option>
                                <option>Gobierno de la ciudad de Bs. As.</option>
                                <option>Desarrollo comercial</option>
                                <option>Desarrollo residencial</option>
                                <option>Estudio arquitectura</option>
                                <option>Particular</option>
                                <option>Otro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nombre de la Empresa / Municipalidad / Ente: <span class="form-asterisco">
                            *</span></label>
                            <input type="text" class="form-control" name="nombre_empresa" required>
                        </div>

                        <div class="form-group">
                            <label for="">Provincia: <span class="form-asterisco">*</span></label>
                            <select class="form-control" name="provincia" required>
                                <option selected>Seleccionar</option>
                                <option>Buenos Aires</option>
                                <option>Capital Federal</option>
                                <option>Catamarca</option>
                                <option>Chaco</option>
                                <option>Chubut</option>
								<option>Córdoba</option>
                                <option>Corrientes</option>
                                <option>Entre Ríos</option>
                                <option>Formosa</option>
                                <option>Jujuy</option>
								<option>La Pampa</option>
                                <option>La Rioja</option>
                                <option>Mendoza</option>
                                <option>Misiones</option>
                                <option>Neuquén</option>
								<option>Río Negro</option>
                                <option>Salta</option>
                                <option>San Juan</option>
                                <option>San Luis</option>
                                <option>Santa Cruz</option>
								<option>Santa Fe</option>
                                <option>Santiago del Estero</option>
                                <option>Tierra del Fuego</option>
                                <option>Tucumán</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Dirección:</label>
                            <input type="text" class="form-control" name="direccion">
                        </div>

                        <div class="form-group">
                            <label for="">Teléfono:</label>
                            <input type="number" class="form-control" name="telefono">
                        </div>

                        <div class="form-group">
                            <label for="">Email: <span class="form-asterisco">*</span></label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="">¿Cómo nos conoció?: <span class="form-asterisco">*</span></label>
                            <select class="form-control" name="conocio" required>
                                <option selected>Elegir una...</option>
                                <option>Búsqueda Google</option>
                                <option>Revista Area Urbana</option>
                                <option>Revista PLOT</option>
                                <option>Revista Mercados & Empresas</option>
                                <option>Feria</option>
                                <option>Recomendación de Amigo o Conocido</option>
                                <option>Instagram / Facebook</option>
                                <option>A través de Premoldeados</option>
                                <option>Otros</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Escriba su comentario: <span class="form-asterisco">*</span></label>
                            <textarea class="form-control" name="comentarios" id="comentario" required></textarea>                                                            
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn form-btn">
								ENVIAR
							</button>
                        </div>
                    </form>    
                </div>
                <div class="col-sm-0 col-md-6">
                    <h4>Donde estamos</h4>
                    <p> <strong>PARAGUAY</strong> <br> Ruta 6ta Km 5 Colectora Norte, Encarnación. <br>
                    premoldeadosdelparaguay@gmail.com</p>
                </div>
            </div>     
        </div>
    </section> 		

    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?> 
    <script src="static/js/sweetalert2.all.min.js"></script>
    <script>
            function mailSend(){
                var currentLocation = window.location.search;
                if(currentLocation == "?mailsend"){
                    Swal.fire(
                        'Mensaje enviado!',
                        'Recibirás una respuesta pronto.',
                        'success'
                    );
                }
                return false;
            }

            mailSend();
        
        </script>
</body>

</html>