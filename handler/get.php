<?php
    
    include '../config.php';
    include '../model/Sat.php';

    if(isset($_POST['updateid']) ){
        $rezultat = Sat::vratiSat($_POST['updateid'],$conn);
        $odgovor = array();
        while($red=mysqli_fetch_assoc($rezultat)){
            $odgovor=$red;
        }
        echo json_encode($odgovor);
    }else{
        $odgovor['poruka']="Nema tog sata";
        echo $odgovor;
    }


?>