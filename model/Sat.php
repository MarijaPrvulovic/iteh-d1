<?php


class Sat{

    private $id;
    private $model;
    private $brend;
    private $cena;
    private $materijalNarukvice;
    private $mehanizamVrsta;

    public function __construct($id=null,$model=null,$brend=null,$cena=null,$materijalNarukvice=null,$mehanizamVrsta=null){
        $this->id=$id;
        $this->model=$model;
        $this->brend=$brend;
        $this->cena=$cena;
        $this->mehanizamVrsta=$mehanizamVrsta;
        $this->materijalNarukvice=$materijalNarukvice;

    }

    public static function vratiSveSatove($conn){
        $upit = "select * from satovi s join mehanizamvrsta m on s.mehanizamVrsta=m.idMeh";
        return $conn->query($upit);
    }
    public static function vratiSat($id,$conn){
        $upit = "select * from satovi s join mehanizamvrsta m on s.mehanizamVrsta=m.idMeh where id=$id";
        return $conn->query($upit);
    }

    public static function obrisiSat($id,$conn){
        $upit = "delete from satovi where id=$id";
        return $conn->query($upit);
    }

    public static function dodajSat($sat, $conn){
    
        $query= "insert into satovi(model,brend,cena,materijalNarukvice,mehanizamVrsta ) values('$sat->model','$sat->brend',$sat->cena,'$sat->materijalNarukvice',$sat->mehanizamVrsta )";

        return $conn->query($query);
        
    
    }




    public static function azurirajSat($sat,$conn){

        $query = "update satovi set model='$sat->model', brend = '$sat->brend', cena = $sat->cena, materijalNarukvice='$sat->materijalNarukvice', mehanizamVrsta=$sat->mehanizamVrsta where id = $sat->id";
        return $conn->query($query);

    }






}






?>