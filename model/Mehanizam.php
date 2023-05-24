<?php

class Mehanizam{
    private $id;
    private $naziv;


    public function __construct($id=null,$naziv=null ){
        $this->id=$id;
        $this->naziv=$naziv; 
    }


    public static function vratiSveVrste($conn){
        $upit = "select * from mehanizamVrsta";
        return $conn->query($upit);
    }







}




?>