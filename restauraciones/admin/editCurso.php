<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/curso.php');


if(isset($_SESSION['logged_in'])){

    if(isset($_GET['titulo']) and isset($_GET['desc'])){

        if(empty($_GET['titulo'] or $_GET['desc'])){
            $error='Debes completar todos los campos.';
        }else{

            $query=$pdo->prepare('UPDATE rescurso SET resCursoTitulo = ?, resCursoDesc = ? WHERE idCurso = 1');

            $query->bindValue(1,$_GET['titulo']);
            $query->bindValue(2,$_GET['desc']);

            $query->execute();

            header('Location: index.php');
        }
    }


    $cu = new Curso;
    $curso= $cu->fetchfirst();

?>


<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS Restauraciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<h4 style="color:white;">Editar informaci&oacute;n: Cursos</h4>
<hr style="padding: 0; margin: 0; background-color: white; width: 15vw; float: left;">
<br>
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

<form class="usform" action="editCurso.php" method="GET" autocomplete="on">
<label style="color:white;" for="titulo">T&iacute;tulo</label>
<input class="form-control" type="text" name="titulo" value="<?php echo $curso['resCursoTitulo']?>"/>
<label style="color:white;" for="desc">Descripci&oacute;n</label>
​<textarea class="form-control" rows="10" cols="70" name="desc"><?php echo $curso['resCursoDesc']?></textarea>
<input class="btn btn-light" type="submit" value="Realizar Cambios">

</form>

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
