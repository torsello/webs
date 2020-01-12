<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/taller.php');
include_once('../includes/image.php');

$taller= new Taller;
$imagen= new Image;
$talleres=$taller->traerTodos();

if(isset($_SESSION['logged_in'])){
    if(isset($_POST['idTaller']) or isset($_POST['idTaller'])){
        if(isset($_POST['imagenes'])){
            $cantidadEnTaller=$_POST['cant'];
            $total=$cantidadEnTaller+count($_POST['imagenes']);
            if($total>10){
                echo "La cantidad de fotos seleccionadas superaria la cantidad maxima permitida por taller.";
                echo  '<br>';
            }else{
                foreach($_POST['imagenes'] as $img){
                    $idImg=$imagen->traerIdImg($img);

                    $query=$pdo->prepare('INSERT INTO taller_img (idTaller, idImg) values(?,?)');
                    $query->bindValue(1,$_POST['idTaller']);
                    $query->bindValue(2,$idImg);
                    $query->execute();

                   header('Location: index.php');
                }
            }

        }else{
            $error="Debes seleccionar por lo menos una imagen";

        }

        ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>CMS Restauraciones</title>

                <link rel="stylesheet" type="text/css" media="screen" href="../static/css/styles.css">
                <link rel="stylesheet" type="text/css" href="../static/css/image-picker.css">
                <link rel="stylesheet" href="../static/css/bootstrap.min.css">
                <link rel="stylesheet" href="../static/css/home.css">
                <link href="../Icons/css/all.css" rel="stylesheet">
                <script src="../static/js/jquery.min.js"></script>
                <script>
                function openNav() {
                  document.getElementById("mySidebar").style.width = "250px";
                  document.getElementById("main").style.marginLeft = "250px";
                }

                function closeNav() {
                  document.getElementById("mySidebar").style.width = "0";
                  document.getElementById("main").style.marginLeft= "0";
                }
                </script>

            </head>
            <body>
            <div id="mySidebar" class="sidebar">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
              <h2>Nosotros</h2>
              <a href="editNosotros.php">Editar informacion</a><br>
              <h2>Cursos</h2>
            <a href="editCurso.php">Editar informacion</a><br>
            <h2>Particulares</h2>
            <a href="editParticulares.php">Editar informacion</a><br>
              <h2>Talleres</h2>
              <a href="agregarTaller.php">Agregar taller</a><br>
              <a href="editTaller.php">Editar taller</a><br>
              <a href="deleteTaller.php">Eliminar taller</a><br>
              <a href="uploadImg.php">Subir imagen</a><br>
              <a href="asignarImg.php">Asignar imgs a taller</a><br>
              <a href="deleteImg.php">Eliminar imgs a taller</a>
              <a class="logout" href="logout.php">Cerrar Sesi&oacute;n</a><br>
            </div>

            <div class="cms" id="main">
              <div class="top-bar container-fluid">
                <button class="openbtn" onclick="openNav()">☰ Men&uacute;</button>
                <a href="index.php"><i style="padding:.5em; color:white; text-decoration:none;" class="fas fa-home"></i></a>
              </div>
              <div class="content container-fluid">
            <h4>Asignar imagen</h4>
            <hr style="padding: 0; margin: 0; color: black; width: 15vw; float: left;">
            <br>


            <?php
            $urlCompleta= getcwd();
            $dir= substr($urlCompleta,0,60)."static/img/";
            $imgs= scandir($dir);
            
            /*comentar en sv
            $dir = 'C:/xampp/htdocs/static/img/';
            $imgs = scandir($dir);
            /*** */
            $i=0;

            $cantidadEnTaller=count($taller->imagenesDeTaller($_POST['idTaller']));

            foreach($taller->imagenesDeTaller($_POST['idTaller']) as $ar1){
                foreach($ar1 as $ar2){
                    $arrayDB[$i]= $ar2;
                    $i++;

                }
            }
            $arrayDBF=(array_unique($arrayDB));
            $arrayImgs = array_diff($imgs, $arrayDBF);
            sort($arrayImgs);

            if(count($arrayImgs)<3){
                unset($error);
                echo "Todas las imágenes subidas se encuentran asignadas al taller.";
            }else if($cantidadEnTaller==10){
                echo "El taller ya posee 10 imágenes asignadas, deberá eliminar alguna antes de asignar nuevas.";
            }else{


            ?>

            <?php
            if(isset($error)){
            ?>

            <small style="color:#aa0000;">
            <?php echo $error; ?>
            </small>
            <br>
            <?php } ?>
            <form action="asignarImg.php" method="post">
            <input type="hidden" name="cant" value="<?php echo $cantidadEnTaller?>">
            <input type="hidden" name="idTaller" value="<?php echo $_POST['idTaller']; ?>">
            <select multiple="multiple" class="image-picker show-html" name="imagenes[]">
                    <?php for($i=2; $i < count($arrayImgs); $i++)
                    {
                        ?>

                           <option data-img-src="../static/img/<?php echo $arrayImgs[$i];?>" class="opt-size" value="<?php echo $arrayImgs[$i];?>" data-img-label="<?php echo $arrayImgs[$i]; ?>" ><?php echo $arrayImgs[$i]; ?></option>

                        <?php } ?>

            </select>

            <input type="submit" value="Asignar">
            </form>

            </div>

            </div>


            <script src="../static/js/image-picker.min.js"></script>
            <script>
                $('.image-picker').imagepicker();
            </script>

            </body>
            </html>

            <?php
        }

    }else{
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CMS Restauraciones</title>

        <link rel="stylesheet" type="text/css" href="../static/css/image-picker.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../static/css/styles.css">
        <link rel="stylesheet" type="text/css" href="../static/css/image-picker.css">
        <link rel="stylesheet" href="../static/css/bootstrap.min.css">
        <link rel="stylesheet" href="../static/css/home.css">
        <link rel="stylesheet" href="../static/css/us.css">
        <link href="../Icons/css/all.css" rel="stylesheet">
        <script src="../static/js/jquery.min.js"></script>

    </head>
    <body>
    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <h2>Nosotros</h2>
      <a href="editNosotros.php">Editar información</a><br>
      <h2>Cursos</h2>
    <a href="editCurso.php">Editar información</a><br>
    <h2>Particulares</h2>
    <a href="editParticulares.php">Editar información</a><br>
      <h2>Talleres</h2>
      <a href="agregarTaller.php">Agregar taller</a><br>
      <a href="editTaller.php">Editar taller</a><br>
      <a href="deleteTaller.php">Eliminar taller</a><br>
      <a href="uploadImg.php">Subir imágenes</a><br>
      <a href="asignarImg.php">Asignar imágenes</a><br>
      <a href="deleteImg.php">Desvincular imágenes</a>
      <a class="logout" href="logout.php">Cerrar Sesi&oacute;n</a><br>
    </div>
    <div class="cms" id="main">
      <div class="top-bar container-fluid">
        <button class="openbtn" onclick="openNav()">☰ Men&uacute;</button>
        <a href="index.php"><i style="padding:.5em; color:white; text-decoration:none;" class="fas fa-home"></i></a>
      </div>
      <div class="content container-fluid">
    <h4 style="color:white;">Seleccione el taller al que desea agregar imágenes</h4>
    <?php
    if(isset($error)){
    ?>

    <small style="color:#aa0000;">
    <?php echo $error; ?>
    </small>


    <?php
    }
    /*comentar en sv
    $dir = 'C:/xampp/htdocs/static/img/';
    $imgs = scandir($dir);*/
    /* DESCOMENTAR EN SERVER*/
    $urlCompleta= getcwd();
    $dir= substr($urlCompleta,0,60)."static/img/";
    $imgs= scandir($dir);
    
    ?>
    <form action="asignarImg.php" method="post">
    <select class="form-control" name="idTaller">
    <?php foreach($talleres as $t){ ?>
        <option value="<?php echo $t['idTaller']; ?>"> <?php echo $t['resTallerTitulo']; ?> </option>
    <?php } ?>
    </select>

    <input style="margin-top: 5em;" class="btn btn-light" type="submit" value="Asignar">
    </form>

    </div>
    </div>

    <script src="../static/js/image-picker.min.js"></script>
    <script>
        $('.image-picker').imagepicker();
    </script>
    <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
    </script>
    </body>
    </html>

<?php
}
}else{
    header('Location: index.php');
}
?>
