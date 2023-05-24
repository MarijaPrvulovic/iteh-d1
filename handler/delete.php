<?php
        include '../config.php';
        include '../model/Sat.php';
    if(isset($_POST['deletesend'])){
        $rez=Sat::obrisiSat($_POST['deletesend'],$conn);
        if($rez){
            echo 'Success';
        }else{
            echo 'Failed';
        }
    }





?>