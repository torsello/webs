<?php

include_once('image.php');

class Taller{
    public function traerTodos(){
        global $pdo;
        
        $query = $pdo->prepare("SELECT * from restaller");
        $query->execute();

        return $query->fetchAll();
    }

    public function traerTaller($id){
        global $pdo;

        $query=$pdo->prepare("SELECT * from restaller WHERE idTaller = ?");
        $query->bindValue(1,$id);
        $query->execute();
        return $query->fetchAll();
    }

    public function cantidadFotos($id){
        global $pdo;

        $query=$pdo->prepare("SELECT count(*) from taller_img where idTaller=?");
        $query->bindValue(1,$id);
        $query->execute();
        $x=$query->fetch();
        $cant=$x[0];

        return $cant;
    }

    public function eliminarTaller($id){
        global $pdo;

        $img=new Image;
        $imgx=new Image;
        $imgs=$img->traerImgPorTaller($id);
        $cantidad = $imgx->contarImg($imgs[0]['idImg']);
        
        $query=$pdo->prepare('DELETE FROM taller_img where idTaller=?');
        $query->bindValue(1,$id);
        $query->execute();

            if($cantidad[0]==1){
                foreach($imgs as $im){
                    //comentar en sv
                    $path='C:/xampp/htdocs/static/img/'.$im['resImgName'];
                    /* DESCOMENTAR EN SERVER 
                    $urlCompleta= getcwd();
                    $path= substr($urlCompleta,0,60)."static/img/".$im['resImgName'];
                    */
                    if(!unlink($path)){
                        echo "Error al eliminar imagen.";
                    }else{
                        $query2=$pdo->prepare('DELETE FROM resimg where idImg=?');
                        $query2->bindValue(1,$im['idImg']);
                        $query2->execute();
                    }
                }   
            }
    

        $query1=$pdo->prepare('DELETE FROM restaller where idTaller=?');
        $query1->bindValue(1,$id);
        $query1->execute();
            
        return "Eliminado";
    }

    public function imagenesDeTaller($id){
        global $pdo;

        $query=$pdo->prepare('SELECT resImgName from resimg inner join taller_img on resimg.idImg=taller_img.idImg inner join restaller on taller_img.idTaller = restaller.idTaller where restaller.idTaller=?');
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetchAll();
    }

    public function __toString() 
    {    
        // returns the class name  
        return __CLASS__; 
    } 

    public function traerCursos(){
        global $pdo;

        $query=$pdo->prepare('SELECT idTaller,resTallerTitulo, resTallerDesc from restaller where resTallerTipo=? ');
        $query->bindValue(1,'Curso');
        $query->execute();

        return $query->fetchAll();
    }

    public function traerParticulares(){
        global $pdo;

        $query=$pdo->prepare('SELECT idTaller,resTallerTitulo, resTallerDesc from restaller where resTallerTipo=? ');
        $query->bindValue(1,'Trabajo particular');
        $query->execute();

        return $query->fetchAll();
    }

    public function traerImgxId($id){
        global $pdo;

        $query=$pdo->prepare('SELECT resimg.resImgName, resimg.resImgUrl from taller_img inner join resimg on taller_img.idImg=resimg.idImg where taller_img.idTaller=?');
        $query->bindValue(1,$id);        
        $query->execute();

        return $query->fetchAll();
    }
}

?>