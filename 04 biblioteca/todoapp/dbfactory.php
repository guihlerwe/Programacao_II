<?php
    $mysqli = new mysqli("localhost","root","Gui@15600","pessoa");

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }
    return $mysqli;
?>