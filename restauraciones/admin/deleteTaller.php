
<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/image.php');
include_once('../includes/taller.php');


$taller=new Taller;
$imagen= new Image;
$image= new Image;
$img=new Image;

if(isset($_SESSION['logged_in'])){
    ?>

    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>CMS Catalogos</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
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

        <?php
        if(isset($error)){
        ?>

        <small style="color:#aa0000;">
        <?php echo $error; ?>
        </small>


        <?php
        }
        ?>



    <?php



    if(isset($_GET['idTaller'])){
        $taller->eliminarTaller($_GET['idTaller']);
    }else{
        $talleres=$taller->traerTodos();
        ?>

        <h4 style="color:white;">Seleccione el taller a eliminar</h4>
        <form action="deleteTaller.php" method="GET">
        <select class="form-control" name="idTaller">
        <?php foreach ($talleres as $taller) {?>
            <option value="<?php echo $taller['idTaller'];?>">
            <?php echo $taller['resTallerTitulo'];?>
            </option>
        <?php }?>
        </select>
        <input style="margin-top: 5em;" class="btn btn-danger" type="submit" value="Borrar">
        </form>
        <?php

    }



    ?>


        </div>

        </div>

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
}else{
    header('Location: index.php');
}

?>
