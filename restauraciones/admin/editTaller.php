<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/taller.php');


$taller1 = new Taller;
$taller2 = new Taller;
$talleres= $taller1->traerTodos();


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

    if( isset($_GET['titulo']) and isset($_GET['desc']) and isset($_GET['tipo']) ){


        if(empty($_GET['titulo']) or empty($_GET['desc']) or empty($_GET['tipo']) ){
            $error='Debes completar todos los campos.';
        }else{
            //Insertar en restaller
            $id=$_GET['idTaller'];
            $titulo=$_GET['titulo'];
            $desc=$_GET['desc'];
            $tipo=$_GET['tipo'];

            $query1=$pdo->prepare('UPDATE restaller SET resTallerTitulo=?, resTallerDesc=?, resTallerTipo=? WHERE idTaller=?');

            $query1->bindValue(1,$titulo);
            $query1->bindValue(2,$desc);
            $query1->bindValue(3,$tipo);
            $query1->bindValue(4,$id);

            $query1->execute();
            

            header('Location: index.php');
        }
    }


if(isset($_GET['idTaller'])){
    if(empty($_GET['idTaller'])){
        $error='Debes seleccionar un taller correcto.';
    }else{
        $taller2=$taller2->traerTaller($_GET['idTaller']);
        ?>
        <!--mostramos el form-->

        <h4 style="color:white;">Editar informaci&oacute;n</h4>
        <hr style="padding: 0; margin: 0; color: black; width: 15vw; float: left;">
        <br>

        <form style="color:white;" class="usform" action="editTaller.php" method="GET">
        <input type="hidden" name="idTaller" value="<?php echo $taller2[0]['idTaller']?>">
        <input type="text" name="titulo" placeholder="Titulo" value="<?php echo $taller2[0]['resTallerTitulo']?>"/>
        <br>
        ​<textarea rows="10" cols="70" name="desc" placeholder="Descripción"><?php echo $taller2[0]['resTallerDesc']?></textarea><br>
        <p>Tipo de taller: </p>
        <select class="form-control" name="tipo">
        <?php if($taller2[0]['resTallerTipo'] =="Curso"){ ?>
            <option value="Curso" selected>Curso</option>
            <option value="Trabajo particular">Trabajo Particular</option>
        <?php }else{ ?>
            <option value="Curso" >Curso</option>
            <option value="Trabajo particular"selected>Trabajo Particular</option>
        <?php } ?>
        </select><br>
        
        <input class="btn btn-primary" type="submit" value="Editar taller">

        </form>

    <?php
    }

}else{ ?>
        <h4 style="color:white;">Seleccione el taller a editar</h4>

        <form action="editTaller.php" method="GET">
        <select class="form-control" name="idTaller">
                <?php foreach ($talleres as $t) {?>
                    <option value="<?php echo $t['idTaller'];?>">
                    <?php echo $t['resTallerTitulo'];
                    ?>
                    </option>
            <?php }?>
        </select>

        <input style="margin-top: 5em;" class="btn btn-light" type="submit" value="Seleccionar taller">

        </form>

    <?php }

    ?>


</div>
</div>

    <script src="../static/js/jquery.min.js"></script>
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
}else{
    header('Location: index.php');
}

?>
