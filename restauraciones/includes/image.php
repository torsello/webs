<?php

class Image{

    public function traerTodos(){
        global $pdo;
        
        $query = $pdo->prepare("SELECT * from resimg");
        $query->execute();

        return $query->fetchAll();
    }

    public function traerImagen($id){
        global $pdo;

        $query=$pdo->prepare("SELECT * from resimg WHERE idImg=?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetchAll();
    }

    public function traerIdImg($name){
        global $pdo;

        $query=$pdo->prepare("SELECT idImg from resimg WHERE resImgName=?");
        $query->bindValue(1,$name);
        $query->execute();
        $id=$query->fetch();

        return $id[0];
    }

    public function traerImgPorTaller($idTaller){
        global $pdo;

        $query=$pdo->prepare("SELECT * FROM resimg inner join taller_img on resimg.idImg=taller_img.idImg inner join restaller on taller_img.idTaller=restaller.idTaller where restaller.idTaller=? ");
        $query->bindValue(1,$idTaller);
        $query->execute();

        return $query->fetchAll();
    }

    public function contarImg($idImg){
        global $pdo;

        $query=$pdo->prepare("SELECT count(*) from taller_img where idImg=?");
        $query->bindValue(1,$idImg);
        $query->execute();

        return $query->fetch();
    }

    public function proximoId(){
        global $pdo;

        $query=$pdo->prepare('SELECT idImg from resimg ORDER BY idImg DESC');
        $query->execute();
        $x=$query->fetch();
        $proxId=$x[0]+1;
        return $proxId;
    }
}

?>
