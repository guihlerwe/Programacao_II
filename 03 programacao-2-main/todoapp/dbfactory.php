<?php
    $mysqli = new mysqli("localhost","root","root","pessoa");

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }
    return $mysqli;
?>