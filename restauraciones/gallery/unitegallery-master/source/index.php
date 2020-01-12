<?php

include_once('../../../includes/connection.php');
include_once('../../../includes/taller.php');

$taller= new Taller;
$array= [];
$imagenes= [];


if($_GET['tipo']=='Curso'){
     $array= $taller->traerCursos();
}else if($_GET['tipo']=='Trabajo Particular'){
     $array= $taller->traerParticulares();
}
?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Galería de fotos | CB Restauraciones</title>
    
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

	<script type='text/javascript' src='unitegallery/js/jquery-11.0.min.js'></script>	
	
    <script src='unitegallery/js/unitegallery.min.js' type='text/javascript'  ></script>
    <link  href='unitegallery/css/unite-gallery.css' rel='stylesheet' type='text/css' />
    
    <script src='unitegallery/themes/tiles/ug-theme-tiles.js' type='text/javascript'></script>

	
</head>

<body style="font-family: 'Rubik', sans-serif; text-align: center; background: rgb(0,0,0);
background: radial-gradient(circle, rgba(0,0,0,1) 0%, rgba(87,28,11,1) 0%, rgba(0,0,0,1) 100%);">
    <div class="father">
     <?php if(count($array)>0):
          $i=0;
          ?>
     
        <?php foreach ($array as $item): ?>
          <div class="wrapper">
            <h2 style="font-size: 3vw; margin-bottom:2vh; color:white;"><?php echo $item['resTallerTitulo'] ?></h2>
            <p style="font-size: 1.3vw; margin-bottom:4vh; color:white;"><?php echo $item['resTallerDesc'] ?></p>
            
          <?php if(count($taller->traerImgxId($item['idTaller']))>0):?>
          <div id="gallery<?php echo $i; ?>" style="display:none;">
            <?php 
               $imagenes=$taller->traerImgxId($item['idTaller']);
               foreach($imagenes as $imagen):?>
            

                <img alt="<?php echo $imagen['resImgName']; ?>"
                     src="../../../<?php echo $imagen['resImgUrl']; ?>"
                     data-image="../../../<?php echo $imagen['resImgUrl']; ?>"
                     data-description="<?php echo $imagen['resImgName']; ?>">

                

            

            
               
               <?php 
               endforeach;
               $i++;
               endif;
               
               ?>
               </div>
               <?php
               endforeach; 
               else:
               ?>
                    <div class="wrapper">
                    <h2 style="margin-bottom:2vh; color:white;">No hay <?php echo $_GET['tipo'];?> disponibles.</h2>
                    </div>
               
              <?php endif;?>
               
        </div>
    </div>
	<script type="text/javascript">

		jQuery(document).ready(function(){
            let childs = $(".father").children().length;
            for(let i = 0; i<childs; i++){
                jQuery("".concat("#gallery", i.toString())).unitegallery();
            }
		});
		
	</script>


</body>
</html>