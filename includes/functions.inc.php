<?php

function emptyInputSignup($name, $email, $pwd){
    $result = true;
    if(empty($name)|| empty($email)|| empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
};

function invalidUserName($name, $pwd){
    $result = true;
      if(!preg_match("/^[a-zA-Z0-9]\s*$/" , $name)){
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

function uidExists($conn_tdc, $name){
  
    $sql = "SELECT * FROM `testlogin` WHERE cu_name = ?;";
    $stmt = mysqli_stmt_init($conn_tdc);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../partPages/signUp.php?error=stmfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
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

function createUser($conn_tdc, $name, $email, $pwd,  $verified){

    $sql = "INSERT INTO testlogin (cu_name, cu_email, cu_pwd, cu_confirmed) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn_tdc);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../partPages/signUp.php?error=stmfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashedPwd, $verified);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../partPages/signUp.php?error=noerrors&$name&$email&$verified");
    exit();
    
};


