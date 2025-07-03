<?php 
    function somar($numero1, $numero2){
        return $numero1 + $numero2;
    }

    $n1 = $_GET["n1"];
    $n2 = $_GET["n2"];

    echo somar($n1,$n2)
    
?>