<?php


class User{


    private $id;
    private $ime;

    private $prezime;
    private $email;
    private $lozinka;



    public function __construct($id=null,$ime=null,$prezime=null,$email=null,$lozinka=null){
        $this->id=$id;
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->lozinka=$lozinka;
        $this->email=$email;

    }


    public static function ulogujSe($user,$conn){
        $upit = "select * from users where email='$user->email' and lozinka='$user->lozinka'";
        return $conn->query($upit);
    }

    public static function registrujSe($user,$conn){
        $upit = "Insert into users(email,lozinka,ime,prezime) values('$user->email','$user->lozinka','$user->ime','$user->prezime')";
        return $conn->query($upit);
    }
}







?>