<?php

class Curso{
    public function fetchfirst(){
        global $pdo;
        
        $query = $pdo->prepare("SELECT * from rescurso");
        $query->execute();

        return $query->fetch();
    }
}

?>