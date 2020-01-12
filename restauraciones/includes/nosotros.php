<?php

class Nosotros{
    public function fetchfirst(){
        global $pdo;
        
        $query = $pdo->prepare("SELECT * from resnosotros");
        $query->execute();

        return $query->fetch();
    }
}

?>