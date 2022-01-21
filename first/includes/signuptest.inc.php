<?php

if(!isset($_POST['submit_signUpTest'])){
    header("location: ../partPages/signUpTest.php");
    exit();
}
else{
    
    $AcName = $_POST['Acname'];
    $email = $_POST['email'];
   
    $pwd = $_POST['pwd'];
    $pwdr = $_POST['pwdr'];
    $date = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
   
    
    $verified = "N";



    require_once 'dbh/dbh.theden.php';
    require_once 'functionsTest.inc.php';

    if(emptyInputSignup($AcName, $email, $pwd, $pwdr) !== false){
        header("location: ../partPages/signUpTest.php?error=emptyinput..$AcName..$email.. $verified");
        exit();
    }


    if(invalidUserName($AcName, $pwd) !== false){
        header("location: ../partPages/signUpTest.php?error=invaliduser..$AcName..$name..$KnAs");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../partPages/signUpTestp.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($pwd, $pwdr) !== false){
        header("location: ../partPages/signUpTest.php?error=pwdnomatch");
        exit();
    }

    if(uidExists($conn_tdc, $AcName) !== false){
        header("location: ../partPages/signUpTest.php?error=usernametaken");
        exit();
    }

    createUser($conn_tdc, $AcName, $email, $pwd, $date, $verified);

}