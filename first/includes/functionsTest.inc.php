<?php


function emptyInputSignup($AcName, $email, $pwd, $pwdr){
    $result = true;
    if(empty($AcName)|| empty($email)|| empty($pwd)|| empty($pwdr)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
};

function invalidUserName($AcName, $pwd){
    $result = true;
      if(!preg_match("/^[a-zA-Z0-9]\s*$/" , $AcName)){
        $result = true;
    }
    else{
        $result = false;
    }
     
        if(!preg_match("/^[a-zA-Z0-9]*$/" , $pwd)){
        $result = true;
        }
        else{
            $result = false;
        }
        return $result;
};
      
        


function invalidEmail($email){
    $result = true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
};


function pwdMatch($pwd, $pwdr){
    $result = false;
    if($pwd !== $pwdr){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function uidExists($conn_tdc, $AcName){
  
    $sql = "SELECT * FROM `testlogin` WHERE cu_name = ?;";
    $stmt = mysqli_stmt_init($conn_tdc);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../partPages/signUp.php?error=stmfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $AcName);
    mysqli_stmt_execute($stmt);
    $resultsData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultsData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);

};

function createUser($conn_tdc, $AcName, $email, $pwd, $date, $verified){

    $sql = "INSERT INTO `testlogin` (cu_name, cu_email, cu_pwd, cu_confirmed, cu_startDate) VALUES ($AcName, $email, $pwd, $verified, $date);";
    $stmt = mysqli_stmt_init($conn_tdc);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../partPages/signUp.php?error=stmfailed");
        exit();
    }
    $hashedPWd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssd", $AcName, $email, $pwd, $verified, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../partPages/signUp.php?error=noerrors");
    exit();
    
};
