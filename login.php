<?php
    require 'config.php'; 
    require 'model/User.php';
    session_start();


    if(isset($_POST["login"])){
        $email = $_POST["emailL"];
        $passw = $_POST["passwordL"];

        $u = new User(null,null,null,$email,$passw);

        $rezultat = User::ulogujSe($u,$conn);
        if(mysqli_num_rows($rezultat)>0){
            $_SESSION["ulogovaniKorisnik"]= $email;
            echo  $_SESSION['ulogovaniKorisnik'];
            echo '<script>alert("USPESNO")</script>';
            header('Location: home.php');
        }else{
            echo '<script>alert("NEUSPESNO")</script>';
        }
    }





?>