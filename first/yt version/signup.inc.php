<?php

if(!isset($_POST['submit_signUp'])){
    header("location: ../partPages/signUp.php");
    exit();
}
else{
    
    $AcName = $_POST['Acname'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $KnAs = $_POST['KnAs'];
    $lMethod = $_POST['lMethod'];
    $pMethod = $_POST['pMethod'];
    $pwd = $_POST['pwd'];
    $pwdr = $_POST['pwdr'];
    $date = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
    $twoYear = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+2);
    
    $verified = "N";



    require_once 'dbh/dbh.theden.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($AcName, $email, $name, $KnAs, $lMethod, $pMethod, $pwd, $pwdr) !== false){
        header("location: ../partPages/signUp.php?error=emptyinput..$AcName..$email..$name..$KnAs..$lMethod..$pMethod..$pwd..$pwdr..$today.. $twoYear.. $verified");
        exit();
    }


    if(invalidUserName($AcName, $name, $KnAs, $pwd) !== false){
        header("location: ../partPages/signUp.php?error=invaliduser..$AcName..$name..$pwd..$KnAs");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../partPages/signUp.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($pwd, $pwdr) !== false){
        header("location: ../partPages/signUp.php?error=pwdnomatch");
        exit();
    }

    if(uidExists($conn_tdc, $KnAs) !== false){
        header("location: ../partPages/signUp.php?error=usernametaken");
        exit();
    }

    createUser($conn_tdc, $AcName, $name, $KnAs, $email, $pwd, $lMethod, $pMethod, $date, $twoYear, $verified);

}