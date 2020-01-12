<!doctype html>
<html lang="es">

<head>
    <?php include('includes/meta.php'); ?>
   
    <?php include('includes/link.php'); ?>

    <title>Premoldeados de Lobos</title>
</head>
<body>
	<?php 
        $idprod=$_GET['idprod'];
        $med=$_GET['med'];
		$med2=$_GET['med2'];
        $peso=$_GET['peso'];
	?>

    <?php include('includes/nav-bar.php'); ?>

    <section class="paginas-productos producto">
        <div class="container">
            <h1><?php echo $idprod; ?></h1>

            <hr class="hr-main">

            <div class="row">
                <div class="col-lg-12 col-xl-4">
                    <p><?php echo $med; ?></p>
					<p><?php echo $med2; ?></p>
                    <p><?php echo $peso; ?></p>
                </div>
                <div class="col-lg-12 col-xl-8">
                    <div>
                        <img src="static/img/<?php echo $idprod; ?>.jpg" class="d-block w-100" alt="...">
                    </div>

                    <hr class="hr-main">

                    <div class="row">
                        <div class="col">
							<a href="contacto.php">
								<button type="submit" class="btn producto-btn">PEDIR PRESUPUESTO</button>
							</a>
                        </div>
                        <div class="col">
                            <a href="fichas/<?php echo $idprod; ?>.pdf" target="blank">
                                <button type="submit" class="btn producto-btn float-right">
                                    DESCARGAR FICHA
                                </button>
                            </a>  
                        </div>
                    </div>   

                    <hr class="hr-main">

                    <h6>PRODUCTOS RELACIONADOS</h6>

                    <hr class="hr-main">

                    <div class="row">
                        <div class="col-12 col-md-4">
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
                        <div class="col-12 col-md-4">
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
                        <div class="col-12 col-md-4">
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
            </div>
        </div>
    </section>

    

    <?php include('includes/footer.php'); ?> 	

    <?php include('includes/script.php'); ?> 
</body>

</html>