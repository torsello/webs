<?php

class Particular{
    public function fetchfirst(){
        global $pdo;
        
        $query = $pdo->prepare("SELECT * from resparticulares");
        $query->execute();

        return $query->fetch();
    }
}

?>