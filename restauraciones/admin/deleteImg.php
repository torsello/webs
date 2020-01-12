
<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/image.php');
include_once('../includes/taller.php');


$taller=new Taller;
$imagen= new Image;
$image= new Image;
$img=new Image;
$talleres=$taller->traerTodos();

if(isset($_SESSION['logged_in'])){
    ?>

    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>CMS Restauraciones</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" type="text/css" href="../static/css/image-picker.css">
            <link rel="stylesheet" href="../static/css/bootstrap.min.css">
            <link rel="stylesheet" href="../static/css/home.css">
            <link rel="stylesheet" href="../static/css/us.css">
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
        <?php
        if(isset($error)){
        ?>

        <small style="color:#aa0000;">
        <?php echo $error; ?>
        </small>
        <br>


        <?php
        }
        ?>



    <?php
    if(isset($_GET['imagenes'])){
        foreach($_GET['imagenes'] as $imagen){
            $image= new Image;
            $id=$imagen;
            $image=$image->traerImagen($id);
            //$path='C:/xampp/htdocs/static/img/'.$image[0]['resImgName'];
            /* DESCOMENTAR EN SERVER*/
            $urlCompleta= getcwd();
            $path= substr($urlCompleta,0,60)."static/img/".$image[0]['resImgName'];
            


            $cant=$img->contarImg($id);
            if($cant[0]==1){

                if(!unlink($path)){
                    $error='Error al eliminar imagen';
                }else{

                    $query0=$pdo->prepare('DELETE FROM taller_img WHERE idImg=?');
                    $query0->bindValue(1,$id);
                    $query0->execute();

                    $query=$pdo->prepare('DELETE FROM resimg WHERE idImg=?');
                    $query->bindValue(1,$id);
                    $query->execute();


                }
            }else{
                    $query0=$pdo->prepare('DELETE FROM taller_img WHERE idImg=? and idTaller=?');
                    $query0->bindValue(1,$id);
                    $query0->bindValue(2,$_GET['idTaller']);
                    $query0->execute();


            }

            }

            //header('Location: index.php');

    }

    if(isset($_GET['idTaller']) and !isset($_GET['imagenes'])){
        if(empty($_GET['idTaller'])){
            echo "Error al seleccionar taller";
        }else{
            $images=$image->traerImgPorTaller($_GET['idTaller']);
            if(count($images)==0){
                echo "Este taller no posee imagenes.";
            }else{
        ?>

        <h4 style="color:white;">Seleccione imagen a eliminar</h4>

            <form action="deleteImg.php" method="GET">
            <input type="hidden" name="idTaller" value="<?php echo $_GET['idTaller']; ?>">
            <select multiple="multiple" class="image-picker show-html" name="imagenes[]">
            <?php

                foreach($images as $image){ ?>
                    <option data-img-src="../<?php echo $image['resImgUrl'] ?>" class="opt-size" value="<?php echo $image['idImg']?>" data-img-label="<?php echo $image['resImgName'] ?>" ><?php echo $image['resImgName'] ?></option>
                <?php }

             ?>

        </select>
                    <input class="btn btn-light" type="submit" value="Eliminar">
            </form>


            <?php
        }
    }
    }else{?>

        <h4 style="color:white;">Seleccione el taller del que desea borrar imágenes:</h4>

        <form action="deleteImg.php" method="GET">
        <select class="form-control" name="idTaller">
        <?php foreach ($talleres as $taller) {?>
            <option value="<?php echo $taller['idTaller'];?>">
            <?php echo $taller['resTallerTitulo'];?>
            </option>
        <?php }?>
        </select>
        <input style="margin-top: 5em;" class="btn btn-light" type="submit" value="Seleccionar">
        </form>
        <?php

    }



    ?>
    </div>
    </div>

    <script src="../static/js/image-picker.min.js"></script>
            <script>
                $('.image-picker').imagepicker();
            </script>


        </body>
    </html>

<?php
}else{
    header('Location index.php');
}

?>
