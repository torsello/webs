<!doctype html>
<html lang="es">

<head>
    <?php include('includes/meta.php'); ?>
   
    <?php include('includes/link.php'); ?>

    <title>Premoldeados de Lobos</title>
</head>

<body>
    <div class="flotante">
        <ul>
            <li>
                <a href="contacto.php"><img src="static/img/sobre.png" alt="error-imagen"></a>
            </li>
            <li>
                <a href="#footer" name="abajo"><img src="static/img/flecha.png" alt="error-imagen"></a>
            </li>
        </ul>
    </div>

    <?php include('includes/nav-bar.php'); ?>

    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active banner" style="background-image: url(static/img/slider-1.jpg);"></div>                
                <div class="carousel-item banner" style="background-image: url(static/img/slider-2.jpg);"></div>
                <div class="carousel-item banner" style="background-image: url(static/img/slider-3.jpg);"></div>
                <div class="carousel-item banner" style="background-image: url(static/img/slider-4.jpg);"></div>
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
    </section>

    
    <section class="productos">
        <div class="container">
            <div class="row productos-titulo">
                <h2>Ultimos Productos</h2>
            </div>

            <hr class="hr-main">  
            
            <div class="row">
                <div class="col-12 col-md-3">
					<a href="producto.php?idprod=Banco Quemu Soft&med=Medidas: 77x68x42 cm&med2=&peso=Peso: 141 Kg">
						<div class="post">
							<img src="static/img/Banco Quemu Soft.jpg" alt="error-imagen">
							<div class="post-s">
								<h2>+</h2>
							</div>
						</div>
					</a>
                    <div class="info">
                        <h6>BANCO QUEMU SOFT</h6>
                        <p>Medidas: 77x68x42 cm <br> Peso: 141 kg</p>
                        <a href="producto.php?idprod=Banco Quemu Soft&med=Medidas: 77x68x42 cm&med2=&peso=Peso: 141 Kg">
                            <p>+ Info</p>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
					<a href="producto.php?idprod=Mesa Kasparov con 2 bancos&med=Medidas Mesa: 70x80x10 cm&med2=Medidas Banco: 50x50x10 cm&peso=Peso Total: 458 Kg">
						<div class="post">
							<img src="static/img/Mesa Kasparov con 2 bancos.jpg" alt="error-imagen">
							<div class="post-s">
								<h2>+</h2>
							</div>
						</div>
					</a>
                    <div class="info">
                        <h6>MESA KASPAROV CON 2 BANCOS</h6>
                        <p> Medidas Mesa: 70x80x10 cm <br>
                            Medidas Banco: 50x50x10 cm <br>
                            Peso Total: 458 kg</p>
                        <a href="producto.php?idprod=Mesa Kasparov con 2 bancos&med=Medidas Mesa: 70x80x10 cm&med2=Medidas Banco: 50x50x10 cm&peso=Peso Total: 458 Kg">
                            <p>+ Info</p>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
					<a href="producto.php?idprod=Cesto de basura doble&med=&med2=&peso=Peso: 160 Kg">
						<div class="post">
							<img src="static/img/Cesto de basura doble.jpg" alt="error-imagen">
							<div class="post-s">
								<h2>+</h2>
							</div>
						</div>
					</a>
                    <div class="info">
                        <h6>CESTO DE BASURA DOBLE</h6>
                        <p> Peso: 160 kg</p>
                        <a href="producto.php?idprod=Cesto de basura doble&med=&med2=&peso=Peso: 160 Kg">
                            <p>+ Info</p>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
					<a href="producto.php?idprod=Mesa Kmi con 4 bancos&med=Medidas Mesa: 84x84x73 cm&med2=&peso=">
						<div class="post">
							<img src="static/img/Mesa Kmi con 4 bancos.jpg" alt="error-imagen">
							<div class="post-s">
								<h2>+</h2>
							</div>
						</div>
					</a>
                    <div class="info">
                        <h6>MESA KMI CON 4 BANCOS</h6>
                        <p>Medidas Mesa: 84x84x73 cm</p>
                        <a href="producto.php?idprod=Mesa Kmi con 4 bancos&med=Medidas Mesa: 84x84x73 cm&med2=&peso=">
                            <p>+ Info</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>

    <?php include('includes/script.php'); ?>   
</body>

</html>