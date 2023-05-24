<?php

        include '../config.php';
        include '../model/Sat.php';


        if(isset($_POST['model']) && isset($_POST['cena']) && isset($_POST['brend'])){
            $sat = new Sat(null,$_POST['model'],$_POST['brend'],$_POST['cena'],$_POST['materijal'],$_POST['vrste']);

            $rezultat =  Sat::dodajSat($sat,$conn);
            if($rezultat){
                echo 'Success';
            }else{
                echo 'Failed';
            }
        }


?>