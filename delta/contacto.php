<?php


if (isset($_POST['submit'])){
    
    
    $name = $_POST['firstname'];
    $surname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['subject'];

    $mailTo ="studio@delta-webs.com";
    $headers = "From: ".$email;
    $msg = "Nombre: ".$name."\nApellido: ".$surname."\nEmail: ".$email."\n\nMensaje: \n".$message;
    $subject = "Contacto desde web";

    mail($mailTo, $subject, $msg, $headers);
    header("Location: index.php?mailsend#Contacto");
}


?>