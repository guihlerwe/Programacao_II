<?php 
    function subtrair($nu3, $nu4){
        return $nu3 - $nu4;
    }

    $nu3 = $_GET["nu3"];
    $nu4 = $_GET["nu4"];

    echo subtrair($nu3,$nu4)
    
?>