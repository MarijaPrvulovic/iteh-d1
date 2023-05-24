<?php

require 'config.php'; 
require 'model/User.php';



if(isset($_POST["registerBtn"])){
    $email = $_POST["email"];
    $passw = $_POST["password"];
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $u = new User(null,$ime,$prezime,$email,$passw);

    $rezultat = User::registrujSe($u,$conn);
    if( $rezultat){
        echo '<script>alert("USPESNO")</script>';
        header('Location: index.php');
    }else{
        echo '<script>alert("NEUSPESNO")</script>';
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="main">

<section class="signup">
    <!-- <img src="images/signup-bg.jpg" alt=""> -->
    <div class="container">
        <div class="signup-content">
            <form method="POST" id="signup-form" class="signup-form">
                <h2 class="form-title">Create account</h2>
                <div class="form-group">
                    <input type="text" class="form-input" name="ime" id="ime" placeholder="Ime..."/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="prezime" id="prezime" placeholder="Prezime..."/>
                </div>
                <div class="form-group">
                    <input type="email" class="form-input" name="email" id="email" placeholder=" Email..."/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                
                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                </div>
                <div class="form-group">
                    <input type="submit" name="registerBtn" id="registerBtn" class="form-submit" value="Sign up"/>
                </div>
            </form>
            <p class="loginhere">
                Have already an account ? <a href="index.php" class="loginhere-link">Login here</a>
            </p>
        </div>
    </div>
</section>

</div>
</body>
</html>
