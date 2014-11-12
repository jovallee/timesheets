<?php
    session_start();
    if(!isset($_SESSION['userID']))
    {   
        header('location: index.php');
    }
    include_once('php/header.php');
    include_once('php/get_data.php')
?>
