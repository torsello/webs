<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])){
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS Restauraciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="../static/css/styles.css">-->
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/css/home.css">
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
<div style="color:white" class="content container-fluid">
  <div style="padding: 1em 0 1em 3em;">
      <h2 style="text-align: center; margin-bottom: .5em;">Guía de usuario</h2>
      <hr style="width: 50%; background-color:white; margin-top: 1em; margin-bottom: 1em;">
      <h4 style="padding-top: 1em;">Edición de contenido de la página principal</h4>
      <p style="padding: 0 0 1em 0;">
          <ul>
              <li>
                  Las opciones <i>Nosotros</i>, <i>Cursos</i> y <i>Particulares</i>, se corresponden con sus secciones homónimas en la web.
              </li>
              <li>
                  En cada una se puede editar el título y la descripción de las mismas.
              </li>
          </ul>
          
      </p>
      <h4 style="padding-top: 1em;">Edición de cursos y trabajos particulares</h4>
      <p style="padding: 0 0 1em 0;">
          <ul>
              <li>
                  Tanto los cursos como los trabajos particulares son llamados <b>talleres</b>.
              </li>
              <li>
                  A la hora de crear un taller se le asigna título, descripción, tipo (curso o particular) e imágenes. Estas imágenes son mostradas en las galerías en la web.
              </li>
              <li>
                  En cualquier momento, es posible asignar imágenes de un taller a otro mediante la opción <i>Asignar imágenes</i>, o subir nuevas mediante <i>Subir imágenes</i>.
              </li>
              <li>
                  Para dejar de mostrar imágenes para un taller dado, se cuenta con la opción <i>Desvincular imágenes</i>.
              </li>
              <li>
                  Tanto el título, como la descripción y el tipo son características editables de un taller. La opción <i>Editar taller</i> permite modificarlas.
              </li>
              <li>
                  Finalmente, se tiene la opción <i>Eliminar taller</i> para borrar algún taller seleccionado.
              </li>
          </ul>
          
      </p>
  </div>
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
    if(isset($_POST['username'], $_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        if(empty($username) or empty($password)){
            $error='Todos los campos son requeridos.';
        }else{
            $query=$pdo->prepare("SELECT * FROM resuser where resUsername = ?");

            $query->bindValue(1,$username);

            $query->execute();

            $user=$query->fetch();

            $hash=$user['resPassword'];

            if(password_verify($password, $hash)){
                $_SESSION['logged_in']=true;

                header('Location: index.php');
                exit();
            }else{
                $error="Incorrect details.";
            }
        }
    }

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS Restauraciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="../static/css/styles.css">-->
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/css/login.css">
</head>
<body>
<div class="loginformcontainer container">
<!--<a href="index.php">CMS</a>-->

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
<form class="loginform" action="index.php" method="POST" autocomplete="off">
    <h3 style="color: white;">¡Bienvenido!</h3>
    <input style="margin-bottom:.5em;" class="form-control" type="text" name="username" placeholder="Usuario">
    <input style="margin-top:.5em; margin-bottom: .5em;" class="form-control" type="password" name="password" placeholder="Contraseña">
    <input class="btn btn-light" type="submit" value="Iniciar Sesi&oacute;n">
</form>

</div>

</body>
</html>
    <?php
}

?>
