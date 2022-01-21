<?php

if(!isset($_POST['submit_login'])){
    header("location: ../partPages/logIn.php");
}
else{
    $userName = $_POST['userName'];
    $pwd = $_POST['pwd'];

    require_once 'dbh/dbh.users.php';
require_once 'functions.inc.php';
}