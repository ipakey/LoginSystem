<?php

/* receive data from form */

if(!isset($_POST['submit-registration'])){
    header("Location: /partPages/signup/php?error=submitnotactioned");
    exit();
}
else{

$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$date = date(mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
$today = date($date);
$verified = 'N';

echo($name." ".$email." ".$pwd." ".$today." ".$verified);

require_once ('functions.inc.php');
require_once ('dbh/dbh_theden.php');

/* error checking */

if(emptyInputSignup($name, $email, $pwd) !== false){
    header("Location: /partPages/signup/php?error=emptyfield");
    exit();
}

if(invalidUserName($name, $pwd) !== false){
    header("Location: /partPages/signup/php?error=invalidinput");
    exit();
}

if(invalidEmail($email) !== false){
    header("Location: /partPages/signup/php?error=invalidemail");
    exit();
}

/* check for duplicate user */

if(uidExists($conn_tdc, $name)!== false){
    header("Location: /partPages/signup/php?error=userexists");
    exit(); 
};

/* create a new user */

createUser($conn_tdc, $name, $email, $pwd,  $verified);
}