<?php

include '../config.php';
include '../model/Sat.php';


if(isset($_POST['modelU']) && isset($_POST['cenaU']) && isset($_POST['brendU'])){
    $sat = new Sat($_POST['idU'],$_POST['modelU'],$_POST['brendU'],$_POST['cenaU'],$_POST['materijalU'],$_POST['vrsteU']);

    $rezultat =  Sat::azurirajSat($sat,$conn);
    if($rezultat){
        echo 'Success';
    }else{
        echo 'Failed';
    }
}



?>