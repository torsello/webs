<!doctype html>
<html lang="es">

<head>
    <?php include('includes/meta.php'); ?>
   
    <?php include('includes/link.php'); ?>

    <title>Premoldeados del Paraguay</title>
</head>

<body>
    <?php include('includes/nav-bar.php'); ?>

    <section class="paginas-productos nosotros">
        <div class="container">
            <h1>Quiénes Somos</h1>
    
            <hr class="hr-main">
    
            <div class="row">
                <div class="col-12 col-lg-6">
                    <p style="font-size: 15px;">Somos una empresa dedicada al desarrollo, fabricación y comercialización de elementos premoldeados de hormigón. </p> 
                    <p style="font-size: 15px;">Poseemos una planta de producción ubicada en la ruta 6ta Km 5 Colectora Norte, Encarnación, Paraguay.</p>
                     <p style="font-size: 15px;">Entre nuestros productos mas relevantes se encuentran, los bancos y mesas premoldeados con hormigón, bordes atérmicos y antideslizantes para piletas, bloques de cemento para jardín y revestimientos para paredes y pisos.</p>
                    
                </div>
                <div class="col-12 col-lg-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="static/img/slider-1.jpg" class="d-block w-100" alt="slider-1">
                            </div>
                            <div class="carousel-item">
                                <img src="static/img/slider-2.jpg" class="d-block w-100" alt="slider-2">
                            </div>
                            <div class="carousel-item">
                                <img src="static/img/slider-3.jpg" class="d-block w-100" alt="slider-3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
    </section>
	
    <?php include('includes/footer.php'); ?>

    <?php include('includes/script.php'); ?>  
</body>

</html>