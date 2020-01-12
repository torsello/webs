<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/taller.php');
include_once('../includes/image.php');

$img = new Image;
$imgs = new Image;
$taller= new Taller;
$talleres= $taller->traerTodos();
if(isset($_SESSION['logged_in'])){

    if(isset($_FILES['file']['name']) and isset($_POST['idTaller'])){

        if(empty($_FILES['file']['name']) or empty($_POST['idTaller'])){
            $error='Debes completar todos los campos.';
        }else{
            $agregar=count($_FILES['file']['name']);
            $cantidad=$taller->cantidadFotos($_POST['idTaller']);

            if($cantidad+$agregar > 10){
                $error="No puedes agregar mas de 10 imagenes, controla la cantidad de fotos asignadas al taller y la cantidad de fotos que estas seleccionando.";
            }else{
                $i=0;

                foreach($_FILES['file']['name'] as $file){
                    $j=0;
                foreach($imgs->traerTodos() as $im){
                    if( strcmp($im['resImgName'], $file)==0 ){
                        $error="La imagen ".$file." ya se encuentra cargada.";
                        $j=1;
                        continue;
                    }
                }
                if($j==1){
                    continue;
                }

            if(count($img->traerTodos())>0){
              $idImg=$img->proximoId();
            }else{
              $idImg=1;
            }
            


            $query=$pdo->prepare('INSERT INTO resimg (idImg,resImgName, resImgUrl) values(?,?,?)');

            $path=$file;
            /* DESCOMENTAR EN SERVER*/
            $urlCompleta= getcwd();
            $pathto= substr($urlCompleta,0,60)."static/img/".$path;
            
            /*Comentar en server
            $pathto='C:/xampp/htdocs/static/img/'.$path;*/
            move_uploaded_file($_FILES['file']['tmp_name'][$i],$pathto) or die( "Could not copy file!");

            $rute = 'static/img/'.$path;
            $query->bindValue(1,$idImg);
            $query->bindValue(2,$path);
            $query->bindValue(3,$rute);

            $query->execute();

            $query0=$pdo->prepare('INSERT INTO taller_img (idTaller, idImg) values(?,?)');
            $query0->bindValue(1,$_POST['idTaller']);
            $query0->bindValue(2,$idImg);
            $query0->execute();

            $i++;
        }
        header('Location: index.php');
        }
        }
    }


    ?>


<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS Catalogos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <div class="content container-fluid">
<h4 style="color:white;">Subir imágenes</h4>
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
<p style="color:white;">Máximo 10 imágenes por taller.</p>
<form action="uploadImg.php" method="POST" autocomplete="on" enctype="multipart/form-data" >

<select style="margin-top: 2em;" class="form-control" name="idTaller">
        <?php foreach ($talleres as $t) {?>
            <option value="<?php echo $t['idTaller'];?>">
            <?php echo $t['resTallerTitulo'];
            ?>
            </option>
    <?php }?>
</select>
<div style="margin-top: 2em;" class="input-group mb-3">
  <!--<div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>-->
  <div class="custom-file">
    <input class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" type="file" name="file[]" multiple/>
    <label class="custom-file-label" for="inputGroupFile01">Elegir archivos</label>
  </div>
</div>
<br>
<input class="btn btn-light" type="submit" value="Subir imágenes">

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
