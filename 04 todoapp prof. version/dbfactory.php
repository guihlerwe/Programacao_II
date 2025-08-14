<?php
    $mysqli = new mysqli("localhost","root","root","programacao_2");

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }
    return $mysqli;
?>