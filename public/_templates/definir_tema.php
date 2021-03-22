<?php
    $tema;
    if (isset($_COOKIE["tema"])){
        $tema = $_COOKIE["tema"];
    } else {
        $tema = "Style";
    }
?>