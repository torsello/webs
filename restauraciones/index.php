<?php 
include_once('includes/connection.php');
include_once('includes/nosotros.php');
include_once('includes/image.php');
include_once('includes/taller.php');
include_once('includes/curso.php');
include_once('includes/particular.php');

$nosotros= new Nosotros;
$taller= new Taller;
$curso= new Curso;
$particular= new Particular;
$image= new Image;
$cursos= [];
$particulares= []; 

$xcurso= $curso->fetchfirst();
//mostrar titulo $xcurso['resCursoTitulo']; mostrar descripcion $xcurso['resCursoDesc'];
$xparticular= $particular->fetchfirst();
//mostrar titulo $xparticular['resParticularesTitulo']; mostrar descripcion $xparticular['resParticularesDesc'];
$xnosotros= $nosotros->fetchfirst();
if(count($taller->traerCursos())>0){
  $cursos= $taller->traerCursos();
}

if(count($taller->traerParticulares())>0){
  $particulares= $taller->traerParticulares();  
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CB Restauraciones </title>

  <!-- CSS -->
  <link href="static/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/css/styles.css">
  <link rel="stylesheet" href="static/css/animate.css">
  <link href="Icons/css/all.css" rel="stylesheet">

</head>
    


<body>
  <div style="text-align: center; position: absolute; background-color: white; height: 100vh; z-index: 9999;" class="preloader container-fluid">
      <div style="margin-top: 45vh;">
          <div style="animation-duration: 1.5s; animation-delay: 0s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-muted">C</div>
          <div style="animation-duration: 1.5s; animation-delay: 0.1s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-primary">A</div>
          <div style="animation-duration: 1.5s; animation-delay: 0.2s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-success">R</div>
          <div style="animation-duration: 1.5s; animation-delay: 0.3s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-info">G</div>
          <div style="animation-duration: 1.5s; animation-delay: 0.4s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-warning">A</div>
          <div style="animation-duration: 1.5s; animation-delay: 0.5s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-danger">N</div>
          <div style="animation-duration: 1.5s; animation-delay: 0.6s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-secondary">D</div>
          <div style="animation-duration: 1.5s; animation-delay: 0.7s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-dark">O</div>
          <div style="animation-duration: 1.5s; animation-delay: 0.8s; font-size: 2.3em; background-color: transparent;" class="spinner-grow text-dark">...</div>
      </div>
  </div>
  <section class="home">
    <div class="landing">
        <a class="button">
            <svg>
                <g>
                    <line
                        y1="31.28" x2="227.62" y2="31.28">
                    </line>
                    <polyline points="222.62 25.78 228.12 31.28 222.62 36.78">
                        
                    </polyline>
                    <circle cx="224.67" cy="30.94" r="30.5" transform="rotate(180 224.67 30.94) scale(1, -1) translate(0, -61)"></circle>
                </g>
            </svg>
            <font>
                Entrar
            </font>
        </a>
    </div>
    <div class="home-bg">
        <div class="container">
            <div class="taller-txt row">
                <div class="col-sm-8 neon-content-1">
                                                         <!-- TITULO -->
                    <h2 style="color:white;"><b><?php echo $xnosotros['resNosotrosTitulo'];?></b></h2>
                    <!-- DESCRIPCION -->
                    <p style="padding-top:10vh; padding-bottom:10vh; color:white;"><?php echo $xnosotros['resNosotrosDesc']; ?> </p>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="neon-bg">
    <?php if(!empty($xcurso)): ?>
        <div class="container">
            <div class="taller-txt row">
                <div class="col-sm-8 neon-content-1">
                    <h2 style="color:white;"><b><?php echo $xcurso['resCursoTitulo'] ?></b></h2>
                    <p style="padding-top:10vh; padding-bottom:10vh; color:white;"><?php echo $xcurso['resCursoDesc'] ?></p>
                    <a href="gallery/unitegallery-master/source/index.php?tipo=Curso"><button style="margin-top:5vh;" type="button" class="btn-contact btn btn-outline-primary">Nuestros cursos</button></a>   
                </div>
              </div>
        </div>
    <?php endif; ?>
    </div>
   
    <div class="servicios-bg">
    <?php if(!empty($xparticular)): ?>
        <div class="container">
            <div class="taller-txt row">
                <div class="col-sm-8 neon-content-1">
                    <h2 style="color:white;"><b><?php echo $xparticular['resParticularesTitulo'] ?></b></h2>
                    <p style="padding-top:10vh; padding-bottom:10vh; color:white;"><?php echo $xparticular['resParticularesDesc'] ?></p>     
                    <a href="gallery/unitegallery-master/source/index.php?tipo=Trabajo Particular"><button style="margin-top:5vh;" type="button" class="btn-contact btn btn-outline-primary">Nuestros trabajos</button></a> 
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
  
    <div class="contacto-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 neon-content-1 contacto">
                      <div class="contact-container">
                          <h2 style="color:white;">Envianos tu consulta</h2>
                          <form action="contacto.php" method="post">
                              <input class="input-text" type="text" name="firstname" placeholder="Nombre"><br>
                              <input class="input-text" type="text" name="lastname" placeholder="Apellido"><br>
                              <input class="input-text" type="email" name="email" placeholder="Email"><br>
                              <textarea class="input-text" rows="5" placeholder="Mensaje" name="subject"></textarea><br>
                              <input class="btn-contact btn btn-outline-primary" type="submit" value="Enviar" name="submit">
                          </form>
                      </div>
                </div>
                <div class="col-sm-4 neon-content-1 contacto">
                      <div style="text-align:justify;" class="contact-container">
                          <h5 style="font-size: 1.3em; color:white;">Información de contacto</h5>
                          <hr style="background-color: white;">
                          <h6 style="margin: 1em 0 1em 0; font-size: 1.1em; color:white;"><i class="fas fa-phone" style="color:#658E9C;"></i> Teléfono: 4242-4242</h6>
                          <h6 style="margin: 1em 0 1em 0; font-size: 1.1em; color:white;"><i class="fas fa-map-marked-alt" style="color:#658E9C;"></i> Dirección: Caseros 321</h6>
                          <h6 style="margin: 1em 0 1em 0; font-size: 1.1em; color:white;"><i class="far fa-clock" style="color:#658E9C;"></i> Horarios: Lunes a Viernes 9:00 a 20:00</h6>
                          <div style="padding: 1.5em 0 1.5em 0">
                              <h5 style="font-size:1.3em; color:white;">Nuestras redes</h5>
                              <hr style="background-color: white;">
                              <div style="padding: .5em 0 .5em 0; text-align: justify;">
                    
                                  <h6 style="margin: .1em 0 .1em 0;"><a href="https://www.instagram.com/tallerderestau/" style="font-size: 1.1em; font-size: 1.1em; color:white;"><i class="fab fa-instagram" style="color: #C13584;"></i> Instagram</a></h6><br>
                                  <h6 style="margin: .1em 0 .1em 0;"><a href="#" style="font-size: 1.1em; color:white; font-size: 1.1em; color:white;"><i class="fab fa-facebook" style="color: #3C5A99;"></i> Facebook</a></h6><br>
                                  <h6 style="margin: .1em 0 .1em 0;"><a href="https://wa.me/5491154859389?text=Hola,%20tengo%20una%20consulta: " style="color:white; font-size: 1.1em; font-size: 1.1em;"><i class="fab fa-whatsapp" style="color:#25D366;"></i> Whatsappp</a></h6>
                                  
                              </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark my-nav">
        <div class="container">
          <!--<img class="home-logo1" src="images/logo.png" alt="logo">-->
          <a style="text-shadow: 0px 3px black; color:#658E9C; font-weight: 700;" class="navbar-brand" href="#">CB <span style="color:white; font-weight: 400;" class="rest">RESTAURACIONES</span></a>
          <button style=";" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li style=";" class="nav-item home-li active">
                <a class="nav-link home-a" href="#">Nosotros</a>
              </li>
              <li style=";" class="nav-item neon-li">
                <a class="nav-link neon-a" href="#">Cursos</a>
              </li>
              <li style=";" class="nav-item servicios-li">
                <a class="nav-link servicios-a" href="#">Particulares</a>
              </li>
              <li style=";" class="nav-item contacto-li">
                <a class="nav-link contacto-a" href="#">Contacto</a>
              </li>
              <li style=";" class="nav-item contacto-li delta-brand-small">
                  <h5 style="text-align: center; font-size: .8em; color: white;">2019 by <a class="" style="text-decoration: none; color:#658E9C;" href="https://www.delta-webs.com">Delta Studio</a></h5>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    </div>
    <div style="text-align: center; position: absolute; z-index: 998; top: 96vh;" class="container-fluid delta-brand-large">
        <h5 style="font-size: .8em; color: white;">2019 by <a class="" style="text-decoration: none;" href="https://www.delta-webs.com">Delta Studio</a></h5>
    </div>
  </section>
  
  <!--<section style="position: absolute; top: 98%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 1em;">
      <h6 >2019 by <a href="#">Delta Studio</a></h6>
  </section>-->
  

  <!-- JavaScript -->
  <script src="static/js/jquery.min.js"></script>
  <script src="static/js/bootstrap.bundle.min.js"></script>
  <script src="static/js/script.js"></script>
  <script src="static/js/jquery.lettering.js"></script>
  <script src="static/js/jquery.textillate.js"></script>
  <script>
        $(window).on("load", function(){
           $(".preloader").fadeOut(1500);    
        });
  </script>
</body>
</html>

