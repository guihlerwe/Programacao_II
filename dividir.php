<?php 
    function dividir($nu7, $nu8){
        if($nu8 != 0){
            return $nu7 / $nu8;
        }
        return 0;

    }

    $nu7 = $_POST["nu7"];
    $nu8 = $_POST["nu8"];

    echo dividir($nu7,$nu8)
    
?>