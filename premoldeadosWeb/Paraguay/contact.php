<?php
if (isset($_POST['submit'])){
    
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $cargo = $_POST['cargo'];
    $tipo = $_POST['tipo'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $provincia = $_POST['provincia'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $conocio = $_POST['conocio'];
    $comentarios = $_POST['comentarios'];

    $mailTo ="web@premoldeadosdelparaguay.com";
    $subject = "Contacto desde premoldeadosdelparaguay.com";
    $msg = "Nombre: ".$nombre."\nApellidos: ".$apellidos."\nCargo: ".$cargo."\nTipo empresa: ".$tipo
    ."\nNombre empresa: ".$nombre_empresa."\nProvincia: ".$provincia."\nDirección: ".$direccion."\nTeléfono: ".$telefono
    ."\nEmail: ".$email."\nForma conocer: ".$conocio."\nComentarios: ".$comentarios;
    $headers = "From: ".$email;    

    mail($mailTo, $subject, $msg, $headers);
    header("Location: contacto.php?mailsend");
}
?>