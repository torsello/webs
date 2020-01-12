<?php


/*COMENTAR EN SV*/

try{
    $pdo=new PDO('mysql:host=localhost;dbname=restauraciones','root','lala123');
}catch(PDOException $e){
    exit('Database Error.'.$e );
}

/*DESCOMENTAR EN SV*/
/*
try{
    $pdo=new PDO('mysql:host=localhost;dbname=u300852633_cms','u300852633_root','lala123');
}catch(PDOException $e){
    exit('Database Error.'.$e );
}
*/



?>